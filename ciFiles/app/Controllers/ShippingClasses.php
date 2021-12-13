<?php

namespace App\Controllers;

use App\Models\ScModel;
use App\Controllers\PageLoader;

class ShippingClasses extends BaseController
{

    public function create()
    {
        $scData = array(
            "title" => $this->request->getPost("title"),
            "weight_min" => $this->request->getPost("weight_min"),
            "weight_max" => $this->request->getPost("weight_max"),
            "domestic_international" => $this->request->getPost("domestic_international"),
            "shipping_charge_express" => $this->request->getPost("shipping_charge_express"),
            "shipping_charge_regular" => $this->request->getPost("shipping_charge_regular")
        );
        $scModel = new ScModel();
        $inserted = $scModel->insert($scData);
        $pageLoader = new PageLoader();
        if ($inserted) {
            $pageLoader->sc_mgt("Shipping Class added","");
        } else {
            $pageLoader->sc_mgt("","Shipping Class not added");
        }
        
    }

    public function delete ()
    {
        $id = $this->request->getPost("id");
        $scModel = new ScModel();
        $deleted = $scModel->delete($id);
        $pageLoader = new PageLoader();
        if ($deleted) {
            $pageLoader->sc_mgt("Shipping Class deleted","");
        } else {
            $pageLoader->sc_mgt("","Shipping Class not deleted");
        }
        
    }

}