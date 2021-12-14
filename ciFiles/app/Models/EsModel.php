<?php namespace App\Models;

use CodeIgniter\Model;

class EsModel extends Model
{

    protected $table = "email_signups";

    protected $primaryKey = 'id';

    protected $allowedFields = ['email'];


}