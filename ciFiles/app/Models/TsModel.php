<?php namespace App\Models;

use CodeIgniter\Model;

class TsModel extends Model
{

    protected $table = "top_strip_messages";

    protected $primaryKey = 'id';

    protected $allowedFields = ['messages'];


}