<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = "role";

    protected $guarded = [''];

    public $timestamps = false;

    public function getPetugas()
    {
        return $this->hasOne("App\Models\PetugasModel", "id_role", "id_role'");
    }
}
