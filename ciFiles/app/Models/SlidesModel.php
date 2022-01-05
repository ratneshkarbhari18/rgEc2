<?php namespace App\Models;

use CodeIgniter\Model;

class SlidesModel extends Model
{

    protected $table = "slides";

    protected $primaryKey = 'id';

    protected $allowedFields = ['position','desktop_image','touch_image','link','visibility'];


}