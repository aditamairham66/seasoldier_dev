<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class GalleryModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $instagram_url;
	public $instagram_name;
	public $instagram_image;
	public $instagram_content;

}