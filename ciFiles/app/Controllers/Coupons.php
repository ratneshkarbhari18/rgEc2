<?php

namespace App\Controllers;

use App\Models\CouponModel;
use App\Controllers\PageLoader;
use CodeIgniter\Pager\Pager;

class Coupons extends BaseController
{

    public function add()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }
        $dataToInsert = array('title' => $this->request->getPost("title"), "code"=> $this->request->getPost("code"), "value"=>$this->request->getPost("value"),"start_date"=>$this->request->getPost("start_date"),"end_date"=>$this->request->getPost("end_date"),'on_off'=>$this->request->getPost("on_off"),"type"=>$this->request->getPost("type"));
        $couponModel = new CouponModel();
        $created = $couponModel->insert($dataToInsert);
        $pageLoader = new PageLoader();
        if ($created) {
            $pageLoader->coupon_mgt("Coupon added","");
        } else {
            $pageLoader->coupon_mgt("","Coupon not added");
        }
    }

    public function update()
    {
        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="admin") {
            return redirect()->to(site_url("admin-login"));
        }

        $id = $this->request->getPost("id");

        $dataToInsert = array('title' => $this->request->getPost("title"), "code"=> $this->request->getPost("code"), "value"=>$this->request->getPost("value"),"start_date"=>$this->request->getPost("start_date"),"end_date"=>$this->request->getPost("end_date"),'on_off'=>$this->request->getPost("on_off"),"type"=>$this->request->getPost("type"));

        $couponModel = new CouponModel();
        $update = $couponModel->update($id,$dataToInsert);
        $pageLoader = new PageLoader();
        if ($update) {
            $pageLoader->coupon_mgt("Coupon updated","");
        } else {
            $pageLoader->coupon_mgt("","Coupon not updated");
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
        $couponModel = new CouponModel();

        $deleted = $couponModel->delete($id);

        $pageLoader = new PageLoader();

        if ($deleted) {
            $pageLoader->coupon_mgt("Coupon Deleted","");
        } else {
            $pageLoader->coupon_mgt("","Coupon not deleted");
        }

    }

}