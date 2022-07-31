<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
	use HasFactory;

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function lecturer()
	{
		return $this->hasOne(User::class, 'id', 'id_lecturer');
	}

	public function category()
	{
		return $this->hasOne(Category::class, 'id', 'id_category');
	}
}
