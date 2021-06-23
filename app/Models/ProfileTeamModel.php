<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class ProfileTeamModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $highlight;
	public $name;
	public $position;
	public $image;
	public $sort;

}