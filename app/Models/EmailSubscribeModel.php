<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class EmailSubscribeModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $date_subscribe;
	public $email;

}