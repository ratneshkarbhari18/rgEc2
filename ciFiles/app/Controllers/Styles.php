<?php

namespace App\Controllers;

use App\Models\StyleModel;

class Styles extends BaseController
{


    public function manage_styles_content(){

        helper("form");

        $styleModel = new StyleModel();

        $allStyles = $styleModel->findAll();

        $data = array("styles" => $allStyles);

        return view("admin_pages/content_pages/styles",$data);

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

        $styleModel = new StyleModel();
        
        $slugExists = $styleModel->where("slug",$slug)->first();

        if ($slugExists) {
            
            $pageLoader->add_style("","Slug already exists");

        }else {

            $featuredImageRandomName = "noimage.jpg";
            $featuredImage = $this->request->getFile('featured_image');
            if ($featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();
                $featuredImage->move('assets/images/style_featured_images', $featuredImageRandomName);
            }

            $dataToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "visibility" => $this->request->getPost("visibility"),
                "parent" => $this->request->getPost("parent"),
                "featured_image" => $featuredImageRandomName
            );

            $inserted = $styleModel->insert($dataToInsert);

            if ($inserted) {
                $pageLoader->add_style("Style added successfully","");
            } else {
                $pageLoader->add_style("","Style not added");
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

        $styleModel = new StyleModel();
        
        $prevStyleData = $styleModel->find($this->request->getPost("style_id"));

        $slugExists = $styleModel->where("slug",$slug)->first();

        if ($slugExists&&$slug!=$prevStyleData["slug"]) {
            
            $pageLoader->edit_style($prevStyleData["slug"],"","Slug already exists");

        }else {

            $featuredImageRandomName = $prevStyleData["featured_image"];
            $featuredImage = $this->request->getFile('featured_image');
            if ($featuredImage->isValid()) {
                $featuredImageRandomName = $featuredImage->getRandomName();
                $featuredImage->move('assets/images/style_featured_images', $featuredImageRandomName);
            }

            $dataToInsert = array(
                "title" => $this->request->getPost("title"),
                "slug" => $slug,
                "description" => $this->request->getPost("description"),
                "visibility" => $this->request->getPost("visibility"),
                "parent" => $this->request->getPost("parent"),
                "featured_image" => $featuredImageRandomName
            );

            $inserted = $styleModel->update($prevStyleData['id'],$dataToInsert);



            if ($inserted) {

                $newStyleData = $styleModel->find($prevStyleData["id"]);
                $pageLoader->edit_style($newStyleData["slug"],"Style added successfully","");
            } else {
                $pageLoader->edit_style($prevStyleData["slug"],"","Style not added");
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

        $styleModel = new StyleModel();

        $deleted = $styleModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->manage_styles("Deleted successfully","");
        } else {
            $pageLoader->manage_styles("","Delete failed");
        }
        

    }

}