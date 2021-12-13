<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table = "products";

    protected $primaryKey = 'id';

    protected $allowedFields = ['title','slug','featured_image','gallery_images','stock_count','featured','visibility','description','price','sale_price','sizes','sku','weight'];

    


}