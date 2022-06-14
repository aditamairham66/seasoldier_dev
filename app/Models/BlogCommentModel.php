<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class BlogCommentModel extends Model
{
    
	public $id;
	public $created_at;
	public $updated_at;
	public $blog_id;
	public $comment;
	public $name;
	public $email;

}