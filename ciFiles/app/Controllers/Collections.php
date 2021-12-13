<?php

namespace App\Controllers;

use App\Models\CollectionModel;

class Collections extends BaseController
{


    public function manage_collections_content(){

        helper("form");

        $collectionModel = new CollectionModel();

        $allCollections = $collectionModel->findAll();

        $data = array("collections" => $allCollections);

        return view("admin_pages/content_pages/collections",$data);

    }

    public function add()
    {
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $pageLoader = new PageLoader();

        if ($this->request->getPost("slug")=="") {
            $slug = strtolower(url_title($this->request->getPost("title")));
        }else {
            $slug = strtolower(url_title($this->request->getPost("slug")));
        }

        $collectionModel = new CollectionModel();
        
        $slugExists = $collectionModel->where("slug",$slug)->first();

        if ($slugExists) {
            
            $pageLoader->add_collection("","Slug already exists");

        }else {

            $featuredImageRandomName = "noimage.jpg";
            $featuredImage = $this->request->getFile('featured_image');
            if ($featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();
                $featuredImage->move('assets/images/collection_featured_images', $featuredImageRandomName);
            }

            $dataToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "visibility" => $this->request->getPost("visibility"),
                "parent" => $this->request->getPost("parent"),
                "featured_image" => $featuredImageRandomName
            );

            $inserted = $collectionModel->insert($dataToInsert);

            if ($inserted) {
                $pageLoader->add_collection("Collection added successfully","");
            } else {
                $pageLoader->add_collection("","Collection not added");
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

        if ($this->request->getPost("slug")=="") {
            $slug = strtolower(url_title($this->request->getPost("title")));
        }else {
            $slug = strtolower(url_title($this->request->getPost("slug")));
        }

        $collectionModel = new CollectionModel();
        
        $prevCollectionData = $collectionModel->find($this->request->getPost("collection_id"));

        $slugExists = $collectionModel->where("slug",$slug)->first();

        if ($slugExists&&$slug!=$prevCollectionData["slug"]) {
            
            $pageLoader->edit_collection($prevCollectionData["slug"],"","Slug already exists");

        }else {

            $featuredImageRandomName = $prevCollectionData["featured_image"];
            $featuredImage = $this->request->getFile('featured_image');
            if ($featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();
                $featuredImage->move('assets/images/collection_featured_images', $featuredImageRandomName);
            }

            $dataToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "visibility" => $this->request->getPost("visibility"),
                "parent" => $this->request->getPost("parent"),
                "featured_image" => $featuredImageRandomName
            );

            $inserted = $collectionModel->update($prevCollectionData["id"],$dataToInsert);


            if ($inserted) {
                $newCollectionData = $collectionModel->find($prevCollectionData["id"]);

                $pageLoader->edit_collection($newCollectionData["slug"],"Collection updated successfully","");
            } else {
                $pageLoader->edit_collection($prevCollectionData["id"],"Collection not updated");
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

        $collectionModel = new CollectionModel();

        $deleted = $collectionModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->manage_collections("Deleted successfully","");
        } else {
            $pageLoader->manage_collections("","Delete failed");
        }
        

    }

}