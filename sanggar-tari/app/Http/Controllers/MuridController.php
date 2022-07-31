<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_murid" => Murid::all()
        ];

        return view("/admin/murid/data_murid", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // = SELECT * FROM murid;
            $data = [
            "data_murid" => Murid::all()
        ];

        return view("/admin/murid/addmurid/index", $data);
        }

    public function tambah_data()
    {
        return view("/admin/murid/addmurid");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nama_murid" => "required",
            "umur" => "required",
            "jenis_kelamin" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {
            $validateData['foto'] = $request->file("foto")->store("image");
        }

        Murid::create($validateData);
        User::create([
            "name" => $request->nama_murid,
            "email" => $request->nama_murid."@gmail.com",
            "password" => bcrypt("murid"),
            "id_role" => 3
        ]);



        return redirect("/admin/murid")->with("tambah", "Data Berhasil di Tambahkan");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "edit" => Murid::where("id", $id)->first()

        ];

        return view("/admin/murid/edit_murid", $data);

    }

    public function detail($id)
    {
        $data = [
            "detail" => Murid::where("id", $id)->first()
        ];

        return view("/admin/murid/detail_murid", $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData = $request->validate([
            "nama_murid" => "required",
            "jenis_kelamin" => "required",
            "umur" => "required",
            "no_hp" => "required",
            "alamat" => "required",
            "foto" => "image"
        ]);


        if ($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['foto'] = $request->file("foto")->store("image");

        }
            Murid::where("id", $request->id)->update($validateData);

        return redirect("/admin/murid")->with("update", "Data Berhasil di update");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->foto) {
            Storage::delete($request->foto);
        }

        $data = Murid::where("id", $request->id)->first();

        $nama_murid = $data->nama_murid;

        Murid::where("id", $request->id)->delete();

        User::where("name", $nama_murid)->delete();

        

        return redirect()->back();
    }
}
