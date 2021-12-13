<?php namespace App\Models;

use CodeIgniter\Model;

class WishlistModel extends Model
{

    protected $table = "wishlist";

    protected $primaryKey = 'id';

    protected $allowedFields = ['cid','pid'];

    public function fetchWlItems()
    {
        return $this->where('cid',session("id"))->findAll();
    }

}