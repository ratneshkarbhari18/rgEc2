<?php namespace App\Models;

use CodeIgniter\Model;

class PsModel extends Model
{

    protected $table = "product_style";

    protected $primaryKey = 'id';

    protected $allowedFields = ['pid','sid'];


}