<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class BlogModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $image;
	public $title;
	public $slug;
	public $publish;
	public $content;

}