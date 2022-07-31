<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\TentangKami;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = [
            "data_tentang_kami" => TentangKami::all()
        ];

    	return view("/page/admin/tentang_kami/data_tentang_kami", $data);
    }

    public function tambah(Request $request)
    {
    	$validatedData = $request->validate([
            "judul" => "required",
            "body" => "required",
			"gambar" => 'image|file|max:1024'
		]);

		if ($request->file("gambar")) {
			$validatedData['gambar'] = $request->file("gambar")->store("tentang_kami");
		}

		TentangKami::create($validatedData);

		return redirect()->back()->with("sukses", "Data Berhasil di Tambah");
    }

    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            "judul" => "required",
            "body" => "required",
            "gambar" => 'image|file|max:1024'
        ]);

        if ($request->file("gambar")) {
            if ($request->oldImage) {
                Storage::delete($request->gambar);
            }

            $validatedData['gambar'] = $request->file("gambar")->store("tentang_kami");
        }

        TentangKami::where("id", $request->id)->update($validatedData);

        return redirect()->back()->with("sukses", "Data Berhasil di Ubah");
    }

    public function hapus(Request $request)
    {
        if ($request->gambar) {
            Storage::delete($request->gambar);
        }

        TentangKami::where("id", $request->id)->delete();

        return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
    }
}
