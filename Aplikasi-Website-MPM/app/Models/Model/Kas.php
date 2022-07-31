<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $table = "tb_kas";

    protected $guarded = [''];

    public $timestamps = false;

    public function getAnggota()
    {
    	return $this->belongsTo("App\Models\Model\Anggota", "nim_anggota", "nim");
    }
}
