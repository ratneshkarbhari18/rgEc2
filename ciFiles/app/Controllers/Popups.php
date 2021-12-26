<?php

namespace App\Controllers;

use App\Models\PopupModel;
use App\Controllers\PageLoader;

class Popups extends BaseController
{

    public function create()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $randomImageName = "noimage.jpg";
        $featuredImage = $this->request->getFile('image');
        if ($featuredImage->isValid()) {
            $randomImageName = $featuredImage->getRandomName();
            $featuredImage->move('assets/images/popupImages', $randomImageName);
        }else {
            $randomImageName = "noimage.jpg";
        }

        $popupModel = new PopupModel();

        $popupData = array(
            "title" => $this->request->getPost("title"),
            "image" => $randomImageName,
            "link" => $this->request->getPost("link"),
            "trigger_timeout" => $this->request->getPost("trigger_timeout"),
            "youtube_embed_code" => $this->request->getPost("youtube_link"),
            "visible" => $this->request->getPost("visible"),
            "has_form" => $this->request->getPost("has_form"),
            "form_fields" => implode(",",$this->request->getPost("form_fields")),
        );

        $created = $popupModel->insert($popupData);

        $pageLoader = new PageLoader();

        if ($created) {
            $pageLoader->popup_mgt("Popup created","");
        } else {
            $pageLoader->popup_mgt("","Popup not created");
        }
        

    }

    public function update()
    {
        $session = session();
        $currentrole = $session->get("role");

        $id = $this->request->getPost("id");

        $popupModel = new PopupModel();

        $prevPopupData = $popupModel->find($id);


        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $featuredImage = $this->request->getFile('image');
        if ($featuredImage->isValid()) {
            $randomImageName = $featuredImage->getRandomName();
            $featuredImage->move('assets/images/popupImages', $randomImageName);
        }else {
            $randomImageName = $prevPopupData[0]["image"];
        }

        
        $popupData = array(
            "title" => $this->request->getPost("title"),
            "image" => $randomImageName,
            "link" => $this->request->getPost("link"),
            "trigger_timeout" => $this->request->getPost("trigger_timeout"),
            "youtube_embed_code" => $this->request->getPost("youtube_link"),
            "visible" => $this->request->getPost("visible"),
            "has_form" => $this->request->getPost("has_form"),
            "form_fields" => $this->request->getPost("form_fields"),
        );

        $created = $popupModel->update($this->request->getPost("id"),$popupData);

        $pageLoader = new PageLoader();

        if ($created) {
            $pageLoader->popup_mgt("Popup updated","");
        } else {
            $pageLoader->popup_mgt("","Popup not updated");
        }
        

    }
    
    public function delete()
    {
        
        $id = $this->request->getPost("id");
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $popupModel = new PopupModel();

        $deleted = $popupModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->popup_mgt("Popup deleted","");
        } else {
            $pageLoader->popup_mgt("","Popup not deleted");
        }
        
    }
}