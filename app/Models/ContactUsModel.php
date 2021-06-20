<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class ContactUsModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $email;
	public $message;

}