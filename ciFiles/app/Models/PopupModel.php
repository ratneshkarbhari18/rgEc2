<?php namespace App\Models;

use CodeIgniter\Model;

class PopupModel extends Model
{

    protected $table = "popups";

    protected $primaryKey = 'id';

    protected $allowedFields = ['title','image','link',"trigger_timeout","youtube_embed_code",'visible','has_form','form_fields'];


}