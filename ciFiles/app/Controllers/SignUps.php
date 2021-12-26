<?php

namespace App\Controllers;

use App\Models\EsModel;
use App\Controllers\PageLoader;
use App\Controllers\BackgroundFeatures;


class SignUps extends BaseController
{

    public function create()
    {

        $fields = json_decode($this->request->getPost("fields"),TRUE);



        $formData = array();

        foreach($fields as $field){
            $formData[$field] = $this->request->getPost($field);
        }

        $backgroundFeatures = new BackgroundFeatures();

        $body = "New Entry from Signup Form";

        foreach($formData as $key=> $fd){
            $body.=" <br>"." ".ucfirst(str_replace("_"," ",$key)).":".$fd;
        }

        // $toEmnail = "sales@rickagauba.com";

        $toEmnail = "ratneshkarbhari18@gmail.com";

        $subject = "New Entry from Signup form in Popup";

        $subscribed = $backgroundFeatures->send_email($toEmnail,"Ricka Gauba Sales",$subject,$body,$body);

        if ($subscribed) {
            echo true;
        } else {
            echo false;
        }
        

    }

    // public function delete()
    // {
    //     $id = $this->request->getPost("id");
    //     $esModel = new EsModel();
    //     $esModel->delete($id);
    //     return redirect()->to(site_url("email-signups"));
    // }

}



