<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class RegionRequestModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $date_request;
	public $city;
	public $email;
	public $phone;

}