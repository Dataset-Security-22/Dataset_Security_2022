<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasFactory;

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function classes()
	{
		return $this->hasOne(Classes::class, 'id', 'id_class');
	}

	public function category()
	{
		return $this->hasOne(Category::class, 'id', 'id_category');
	}
}