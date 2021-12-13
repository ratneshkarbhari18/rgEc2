<?php

namespace App\Controllers;
use App\Models\WishlistModel;

class Wishlist extends BaseController
{

    public function add()
    {
        
        $pid = $this->request->getPost("pid");
        $cid = session("id");
        $wishlistModel = new WishlistModel();

        $exists = $wishlistModel->where("pid",$pid)->where("cid",$cid)->first();

        if ($exists) {
            return "already-exists";
        } else {
            
            $addedToWl = $wishlistModel->insert(array("pid"=>$pid,"cid"=>$cid));
           
            if ($addedToWl) {
                return "success";
            } else {
                return "failure";
            }
            
            
        }
        

    }

    public function delete()
    {
        $wlItemId = $this->request->getPost("id");
        $wishlistModel = new WishlistModel();
        $deleted = $wishlistModel->delete($wlItemId);
        return redirect()->to(site_url("wishlist"));
    }

}