<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBlog extends Model
{
    use HasFactory;

    protected $table = "tb_post";

    protected $guarded = [''];

    public $timestamps = false;

    public function getKategori()
    {
    	return $this->hasOne("App\Models\Model\Kategori", "id_kategori", "id_kategori");
    }
}
