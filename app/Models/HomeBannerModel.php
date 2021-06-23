<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class HomeBannerModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $title;
	public $caption;
	public $image;
	public $sort;

}