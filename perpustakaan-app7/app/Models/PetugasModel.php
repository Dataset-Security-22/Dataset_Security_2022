<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PetugasModel extends Model

{
    public function allData()
    {
        return DB::table('users')->get();
    }

    public function detailData($id){
        return DB::table('users')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('users')->insert($data);
    }

    public function editData($id, $data){
        DB::table('users')
        ->where('id', $id)
        ->update($data);
    }

    public function deleteData($id){
        DB::table('users')
        ->where('id', $id)
        ->delete();
    }

    protected $table = "users";

    protected $guarded = [''];

    public function getRole()
    {
        // SELECT * FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori

        // return $this->belongsTo(ModelYangInginDiJoin, AtributJoinChild , AtributJoinParent)
        return $this->belongsTo("App\Models\Role", "id_role", "id");
    }


}
