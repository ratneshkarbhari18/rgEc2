<?php namespace App\Models;

use CodeIgniter\Model;

class TestimonialsModel extends Model
{

    protected $table = "testimonials";

    protected $primaryKey = 'id';

    protected $allowedFields = ['name','testimonial','mugshot'];


}