<?php

namespace App\Controllers;

use App\Models\SlidesModel;
use App\Controllers\PageLoader;

class Slides extends BaseController
{

    public function add_new()
    {
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-dashboard"));
        }

        $desktopImage = $this->request->getFile('desktop_image');
        if ($desktopImage->isValid()) {
            $desktopImageRandomName = $desktopImage->getRandomName();
            $desktopImage->move('assets/images/slider_images', $desktopImageRandomName);
        }else {
            $desktopImageRandomName = "noimage.jpg";
        }

        $touchImage = $this->request->getFile('touch_image');
        if ($touchImage->isValid()) {
            $touchImageRandomName = $touchImage->getRandomName();
            $touchImage->move('assets/images/slider_images', $touchImageRandomName);
        }else {
            $touchImageRandomName = "noimage.jpg";
        }


        $dataToInsert  = array('desktop_image' => $desktopImageRandomName, "touch_image"=>$touchImageRandomName, "link"=>$this->request->getPost("link"), "visibility"=>$this->request->getPost("visibility"));

        $slidesModel = new SlidesModel();

        $created = $slidesModel->insert($dataToInsert);
        $pageLoader = new PageLoader();

        if ($created) {
            $pageLoader->manage_slides("Slide Added","");
        } else {
            $pageLoader->manage_slides("","Slide not Added");
        }
    
    }


    public function update()
    {
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-dashboard"));
        }

        $slidesModel = new SlidesModel();

        $prevSlideData = $slidesModel->find($this->request->getPost("id"));


        $desktopImage = $this->request->getFile('desktop_image');
        if ($desktopImage->isValid()) {
            $desktopImageRandomName = $desktopImage->getRandomName();
            $desktopImage->move('assets/images/slider_images', $desktopImageRandomName);
        }else {
            $desktopImageRandomName = $prevSlideData["desktop_image"];
        }

        $touchImage = $this->request->getFile('touch_image');
        if ($touchImage->isValid()) {
            $touchImageRandomName = $touchImage->getRandomName();
            $touchImage->move('assets/images/slider_images', $touchImageRandomName);
        }else {
            $touchImageRandomName = $prevSlideData["touch_image"];
        }


        $dataToUpdate  = array('desktop_image' => $desktopImageRandomName, "touch_image"=>$touchImageRandomName, "link"=>$this->request->getPost("link"),"visibility"=>$this->request->getPost("visibility"));


        $created = $slidesModel->insert($dataToUpdate);
        $pageLoader = new PageLoader();

        if ($created) {
            $pageLoader->manage_slides("Slide Updated","");
        } else {
            $pageLoader->manage_slides("","Slide not Updated");
        }
        
    }


    public function delete()
    {
        
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-dashboard"));
        }

        $id = $this->request->getPost("id");

        $slidesModel = new SlidesModel();
        $pageLoader = new PageLoader();

        $deleted = $slidesModel->delete($id);

        if ($deleted) {
            $pageLoader->manage_slides("Slide Deleted","");
        } else {
            $pageLoader->manage_slides("","Slide not deleted");
        }
        
    }

}