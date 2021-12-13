<?php namespace App\Models;

use CodeIgniter\Model;

class StyleModel extends Model
{

    protected $table = "styles";

    protected $primaryKey = 'id';

    protected $allowedFields = ['title','slug','parent', 'featured_image','description','visibility'];


}