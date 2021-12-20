<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{

    protected $table = "orders";

    protected $primaryKey = 'id';

    protected $allowedFields = ['public_order_id','currency','amount_paid','status','status_details','address','order_details','customer_details','date',"customer_id","awb_no","shipped_by","country","state"];

    public function fetch_all_cart_items(){
        return $this->where('ip_address',$_SERVER['REMOTE_ADDR'])->findAll();
    }   


}