<?php namespace App\Models;

use CodeIgniter\Model;

class ScModel extends Model
{

    protected $table = "shipping_classes";

    protected $primaryKey = 'id';

    protected $allowedFields = ["title",'weight_min','weight_max','domestic_international',"shipping_charge_express","shipping_charge_regular"];


}