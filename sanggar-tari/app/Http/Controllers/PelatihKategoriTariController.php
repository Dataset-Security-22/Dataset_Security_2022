<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriTari;
use App\Models\Pelatih;
use App\Models\PelatihKategoriTari;

class PelatihKategoriTariController extends Controller
{
    public function index()
    {
        $data = [
        	"data_kategori" => KategoriTari::orderBy("nama_kategori_tari", "DESC")->get(),
        	"data_pelatih" => Pelatih::orderBy("nama_pelatih", "DESC")->get(),
            "data_pelatih_kategori" => PelatihKategoriTari::orderBy("id_pelatih_kategori", "ASC")->get()
        ];

        return view("/admin/pelatih_kategori_tari/data_pelatih_kategori_tari", $data);
    }

    public function tambah(Request $request)
    {
        PelatihKategoriTari::create($request->all());

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        PelatihKategoriTari::where("id_pelatih_kategori", $request->id_pelatih_kategori)->delete();

        return redirect()->back();
    }

    public function edit($id_pelatih_kategori)
    {
        $data = [
            "data_kategori" => KategoriTari::orderBy("nama_kategori_tari", "DESC")->get(),
        	"data_pelatih" => Pelatih::orderBy("nama_pelatih", "DESC")->get(),
        	"edit" => PelatihKategoriTari::where("id_pelatih_kategori", $id_pelatih_kategori)->first(),
            "data_pelatih_kategori" => PelatihKategoriTari::where("id_pelatih_kategori", "!=", $id_pelatih_kategori)->orderBy("id_pelatih_kategori", "ASC")->get()
        ];

        return view("/admin/pelatih_kategori_tari/edit_pelatih_kategori_tari", $data);
    }

    public function simpan(Request $request)
    {
        PelatihKategoriTari::where("id_pelatih_kategori", $request->id_pelatih_kategori)->update([
            "id_kategori" => $request->id_kategori,
            "id_pelatih" => $request->id_pelatih
        ]);

        return redirect("/admin/pelatih_kategori_tari");
    }
}
    