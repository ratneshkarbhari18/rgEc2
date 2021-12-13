<?php namespace App\Models;

use CodeIgniter\Model;

class PcModel extends Model
{

    protected $table = "product_collection";

    protected $primaryKey = 'id';

    protected $allowedFields = ['pid','cid'];


}