<?php

namespace App\Controllers;

use App\Models\EsModel;
use App\Controllers\PageLoader;


class EmailSignups extends BaseController
{

    public function create()
    {
        $emailEntered = $this->request->getPost("email");
        $esModel = new EsModel();
        $exists = $esModel->where("email",$emailEntered)->first();
        if(!$exists){
            $inserted = $esModel->insert(array("email"=>$emailEntered));
        }

        return redirect()->to(site_url());

    }

    public function delete()
    {
        $id = $this->request->getPost("id");
        $esModel = new EsModel();
        $esModel->delete($id);
        return redirect()->to(site_url("email-signups"));
    }

}



