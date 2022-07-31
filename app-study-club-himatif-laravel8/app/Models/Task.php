<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use HasFactory;

	protected $guarded = ['id', 'updated_at'];

	public function lecturer()
	{
		return $this->hasOne(User::class, 'id', 'id_lecturer');
	}
}
