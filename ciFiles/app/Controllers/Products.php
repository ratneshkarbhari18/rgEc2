<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Controllers\PageLoader;
use App\Models\PcModel;
use App\Models\PsModel;

class Products extends BaseController
{

    public function delete_gallery_image()
    {
        $pid = $this->request->getGet("pid");
        $galleryImage = $this->request->getGet("gallery_image");
        $productModel = new ProductModel();
        $pdata = $productModel->find($pid);
        $galleryImages = explode(",",$pdata["gallery_images"]);
        if (($key = array_search($galleryImage, $galleryImages)) !== false) {
            unset($galleryImages[$key]);
        }        
        unset($galleryImages[$key]);
        $galleryImagesString = implode(",",$galleryImages);
        $dataArray = array("gallery_images"=>$galleryImagesString);
        $productModel->update($pid,$dataArray);
        return redirect()->to(site_url("edit-product/".$pdata["slug"]));
    }


    public function add()
    {
    
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }
        $pageLoader = new PageLoader();

        $productModel = new ProductModel();

        $title = $this->request->getPost('title');
        
        $slugEntered = $this->request->getPost('slug');
        
        if ($slugEntered=='') {
            $slug = strtolower(url_title($title,'-',TRUE));
        } else {
            $slug = strtolower(url_title($slugEntered,'-',TRUE));
        }
        
        $productExists = $productModel->where('slug',$slug)->first();

        if ($productExists) {
            
            $pageLoader->add_product("","Product with this slug already exists");
            
        } else {

            $description = $this->request->getPost('description');
            $price = $this->request->getPost('price');
            $sale_price = $this->request->getPost('sale_price');
            if ($sale_price==0) {
                $sale_price=$price;
            }
            $sizes = $this->request->getPost('sizes');
            $stock_count = $this->request->getPost('stock_count');
            $visibility = $this->request->getPost('visibility');
            $featured = $this->request->getPost('featured');
            


            
            

            // Featured Image Upload

            $featuredImage = $this->request->getFile('featured_image');

			

            if (! $featuredImage->hasMoved()&&$featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();

                $featuredImage->move('assets/images/featured_image_product', $featuredImageRandomName);

            }else {
                $featuredImageRandomName="noimage.jpg";
            }


            // GalleryImages Upload
            $galleryImages = $this->request->getFilemULTIPLE('gallery_images');

            $galleryImageNames = '';

			foreach ($galleryImages as $galleryImage) {

				$galleryImageRandomName = $galleryImage->getRandomName();

				$galleryImage->move('assets/images/gallery_images_product', $galleryImageRandomName);

				if($galleryImageNames==''){
					$galleryImageNames.=$galleryImageRandomName;
				}else{
					$galleryImageNames.=','.$galleryImageRandomName;
				}

			}

            
    
            $productData = array(
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'featured_image' => $featuredImageRandomName,
                'gallery_images' => $galleryImageNames,
                'sizes' => $sizes,
                'sku' => $this->request->getPost("sku"),
                'featured' => $featured,
                'price' =>  $price,
                'sale_price' =>  $sale_price,
                'stock_count' => $stock_count,
                'visibility' => $visibility,
                'weight' => $this->request->getPost('weight'),
            );
            

            $response = $productModel->insert($productData);
            $pid = $productModel->getInsertID();


            if ($response) {

                $db = \Config\Database::connect();
                
                foreach($this->request->getPost("collections") as $collection){
                    $sql = "INSERT INTO product_collection (pid, cid) VALUES (".$db->escape($pid).", ".$db->escape($collection).")";
                    $db->query($sql);
                }

                foreach($this->request->getPost("styles") as $style){
                    $sql = "INSERT INTO product_style (pid, sid) VALUES (".$db->escape($pid).", ".$db->escape($style).")";
                    $db->query($sql);
                }
                
               $pageLoader->add_product("Product added","");

            } else {
                
                $pageLoader->add_product("","Product not added");

            }
            

        }
        
    }
    
    public function update()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }
        $pageLoader = new PageLoader();

        $productModel = new ProductModel();

        $prevProductDetails = $productModel->find($this->request->getPost("product_id"));

        $title = $this->request->getPost('title');
        
        $slugEntered = $this->request->getPost('slug');
        
        if ($slugEntered=='') {
            $slug = strtolower(url_title($title,'-',TRUE));
        } else {
            $slug = strtolower(url_title($slugEntered,'-',TRUE));
        }
        
        $productExists = $productModel->where('slug',$slug)->first();

        if ($productExists&&$slug!=$prevProductDetails["slug"]) {
            
            $pageLoader->edit_product($prevProductDetails["slug"],"","Product with this slug already exists");
            
        } else {

            $description = $this->request->getPost('description');
            $price = $this->request->getPost('price');
            $sale_price = $this->request->getPost('sale_price');

            if ($sale_price==0) {
                $sale_price=$price;
            }

            $sizes = $this->request->getPost('sizes');
            $stock_count = $this->request->getPost('stock_count');
            $visibility = $this->request->getPost('visibility');
            $featured = $this->request->getPost('featured');


            

            // Featured Image Upload

            $featuredImage = $this->request->getFile('featured_image');

			

            if (! $featuredImage->hasMoved()&&$featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();

                $featuredImage->move('assets/images/featured_image_product', $featuredImageRandomName);

            }else {
                $featuredImageRandomName=$prevProductDetails["featured_image"];
            }


            // GalleryImages Upload
            $galleryImages = $this->request->getFilemULTIPLE('gallery_images');

            $galleryImageNames = $prevProductDetails["gallery_images"];
            $galleryImageNamesx = $galleryImageNames;

			foreach ($galleryImages as $galleryImage) {

                if ($galleryImage->isValid()) {

                    $galleryImageRandomName = $galleryImage->getRandomName();

                    $galleryImage->move('assets/images/gallery_images_product', $galleryImageRandomName);
    
                    if($galleryImageNamesx==''){
                        $galleryImageNamesx.=$galleryImageRandomName;
                    }else{
                        $galleryImageNamesx.=','.$galleryImageRandomName;
                    }
                    
                }else {
                    $galleryImageNamesx = $prevProductDetails["gallery_images"];
                }

			}

            $galleryImageNames = $galleryImageNamesx;
    
            $productData = array(
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'featured_image' => $featuredImageRandomName,
                'gallery_images' => $galleryImageNames,
                'sizes' => $sizes,
                'sku' => $this->request->getPost("sku"),
                'featured' => $featured,
                'price' =>  $price,
                'sale_price' =>  $sale_price,
                'stock_count' => $stock_count,
                'visibility' => $visibility,
                'weight' => $this->request->getPost('weight'),
            );
            

            $response = $productModel->update($prevProductDetails["id"],$productData);
            $pid = $productModel->getInsertID();


            if ($response) {

                $newProductDetails = $productModel->find($prevProductDetails["id"]);

                $pcModel = new PcModel();
                $psModel = new PsModel();

                $pid = $prevProductDetails["id"];
                
                foreach($this->request->getPost("collections") as $collection){
                    $pcModel->where("cid !=",$collection)->where("pid",$prevProductDetails["id"])->delete();

                    $exists = $pcModel->where("pid",$pid)->where("cid",$collection)->first();
                    if (!$exists) {
                        $pcModel->insert(array("pid"=>$pid,"cid"=>$collection));
                    }
                }

                
                foreach($this->request->getPost("styles") as $style){
                    $exists = $psModel->where("pid",$pid)->where("sid",$style)->first();
                    $psModel->where("sid !=",$style)->where("pid",$prevProductDetails["id"])->delete();
                    
                    if (!$exists) {
                        $psModel->insert(array("pid"=>$pid,"sid"=>$style));
                    }
                }
                
               $pageLoader->edit_product($newProductDetails["slug"],"Product updated","");

            } else {
                
                $pageLoader->edit_product($prevProductDetails["slug"],"","Product not updated");

            }
            

        }
    }

    public function delete()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $id = $this->request->getPost("id");

        $productModel = new ProductModel();

        $deleted = $productModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->manage_products("Deleted successfully","");
        } else {
            $pageLoader->manage_products("","Delete failed");
        }
        

    }

}