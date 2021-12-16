<?php

namespace App\Controllers;

use App\Models\TestimonialsModel;
use App\Controllers\PageLoader;
use CodeIgniter\Pager\Pager;

class Testimonials extends BaseController
{


    public function add()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }
        $mugshotRandomName = "noimage.jpg";
        $mugshot = $this->request->getFile('mugshot');
        if ($mugshot->isValid()) {
            $mugshotRandomName = $mugshot->getRandomName();
            $mugshot->move('assets/images/testimonial_images', $mugshotRandomName);
        }
        $dataToInsert = array('name' => $this->request->getPost("name"), "testimonial"=> $this->request->getPost("testimonial"), "mugshot"=>$mugshotRandomName);
        $testimonialsModel = new TestimonialsModel();
        $created = $testimonialsModel->insert($dataToInsert);
        $pageLoader = new PageLoader();
        if ($created) {
            $pageLoader->manage_testimonials("Testimonial added","");
        } else {
            $pageLoader->manage_testimonials("","Testimonial not added");
        }
    }


    public function update()
    {
        $session = session();
        $currentrole = $session->get("role");
        

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $testimonialsModel = new TestimonialsModel();

        $id = $this->request->getPost("id");

        $prevTestimonial = $testimonialsModel->find($id);

        $mugshotRandomName = "noimage.jpg";
        $mugshot = $this->request->getFile('mugshot');
        if ($mugshot->isValid()) {
            $mugshotRandomName = $mugshot->getRandomName();
            $mugshot->move('assets/images/testimonial_images', $mugshotRandomName);
        }else {
            $mugshotRandomName = $prevTestimonial["mugshot"];
        }
        $dataToUpdate = array('name' => $this->request->getPost("name"), "testimonial"=> $this->request->getPost("testimonial"), "mugshot"=>$mugshotRandomName);
        $updated = $testimonialsModel->update($id,$dataToUpdate);
        $pageLoader = new PageLoader();
        if ($updated) {
            $pageLoader->manage_testimonials("Testimonial updated","");
        } else {
            $pageLoader->manage_testimonials("","Testimonial not updated");
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
        $testimonialsModel = new TestimonialsModel();

        $deleted = $testimonialsModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->manage_testimonials("Testimonial Deleted","");
        } else {
            $pageLoader->manage_testimonials("","Testimonial not deleted");
        }
        
    }
}