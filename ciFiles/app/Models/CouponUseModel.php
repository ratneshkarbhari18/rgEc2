<?php namespace App\Models;

use CodeIgniter\Model;

class CouponUseModel extends Model
{

    protected $table = "coupon_usage";

    protected $primaryKey = 'id';

    protected $allowedFields = ['customer_id','coupon_code'];


}