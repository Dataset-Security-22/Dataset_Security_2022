<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoSyarat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoSyaratController extends Controller
{

    public function index()
    {
        $data = [
            "foto_syarat" => FotoSyarat::orderBy("id", "ASC")->get()
        ];
        return view("owner.foto_syarat.index", $data);
    }


    public function tambah(Request $request)
    {
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            foreach ($img as $key) {
                $filename = $key->hashName("image/");
                $key->store("image");
                $images = FotoSyarat::create(['image' => $filename, "id_foto_syarat" => Auth::user()->id, "nama_pengguna" => Auth::user()->name,]);
            }
        }
        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }



    public function hapus(Request $request)
    {
        FotoSyarat::where("id", $request->id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => FotoSyarat::where("id", $request->id)->first(),
        ];

        return view("owner.foto_syarat.edit", $data);
    }



    public function simpan(Request $request)
    {
        if ($request->file("image")) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $coba = $request->file("image")->store("image");
        }else{
            $coba = $request->oldGambar;
        }
        FotoSyarat::where("id", $request->id)->update([
            "image" => $coba,
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }


}









