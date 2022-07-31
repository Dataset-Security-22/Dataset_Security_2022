<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use Facade\FlareClient\View;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{

    public function index(){

        $data = [

            "buku" => BukuModel::orderBy("judul")->get()
        ];

        return view('/admin/buku/buku', $data);
    }

    public function kode_buku(){

        $select =  BukuModel::max('kode_buku');
        $kodeBuku = $select;

        $noUrut = (int) substr($kodeBuku, 3,3);
        $noUrut++;
        $kode = "BK-";
        $hasil = $kode . sprintf("%03s", $noUrut);

        return $hasil;

    }

    public function insert(Request $request){

        $message = [
        'kode_buku.required' => 'wajib diisi!!',
        'kode_buku.unique' => 'kode buku ini sudah ada!!!',
        'kode_buku.min' => 'Min 4 Karakter',
        'kode_buku.max' => 'Max 7 Karakter',
        'judul.required' => 'wajib diisi!!',
        'pengarang.required' => 'wajib diisi!!',
        'tahun_terbit.required' => 'wajib diisi!!',
        'penerbit.required' => 'wajib diisi!!',
        'stok.required' => 'wajib diisi!!',

        ];

        $this->validate($request, [
            'kode_buku' => 'required|unique:buku,kode_buku|min:4|max:7',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'penerbit' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
        ], $message);

        // $cek_double = BukuModel::where(["nama_kategori" => $request->nama_kategori])->count();

        // if ($cek_double > 0) {
        //     return redirect()->back()->with("gagal", "Tidak Boleh Duplikasi Data");
        // }

        BukuModel::create($request->all());

        return redirect()->route('buku')->with('pesan','data berhasil di tambahkan');
    }

    public function add(){
        $data = [
            "kode" => $this->Kode_buku(),
            "kategori" => KategoriModel::orderBy("nama_kategori", "DESC")->get()
        ];
        return view('/admin/buku/tambah_buku', $data);
    }

    public function edit($id_buku){
        $data = [
            "edit" => BukuModel::where("id_buku", $id_buku)->first(),
            "buku" => BukuModel::where("id_buku", "!=" , $id_buku)->get(),
            "kategori" => KategoriModel::orderBy("nama_kategori", "DESC")->get()
        ];

        return view("/admin/buku/edit_buku", $data);
    }

    public function update(Request $request)
    {
        $message = [
            'kode_buku.required' => 'wajib diisi!!',
            'kode_buku.unique' => 'kode buku ini sudah ada!!!',
            'kode_buku.min' => 'Min 4 Karakter',
            'kode_buku.max' => 'Max 7 Karakter',
            'judul.required' => 'wajib diisi!!',
            'pengarang.required' => 'wajib diisi!!',
            'tahun_terbit.required' => 'wajib diisi!!',
            'penerbit.required' => 'wajib diisi!!',
            'stok.required' => 'wajib diisi!!',

            ];

            $this->validate($request, [
                'kode_buku' => 'required|min:4|max:7',
                'judul' => 'required',
                'pengarang' => 'required',
                'tahun_terbit' => 'required',
                'penerbit' => 'required',
                'stok' => 'required',
            ], $message);

            BukuModel::where("id_buku", $request->id_buku)->update([
                "kode_buku" => $request->kode_buku,
                "judul" => $request->judul,
                "pengarang" => $request->pengarang,
                "tahun_terbit" => $request->tahun_terbit,
                "penerbit" => $request->penerbit,
                'id_kategori'=> $request->id_kategori,
                'stok'=> $request->stok,
            ]);

        return redirect("/buku");
    }

    public function hapus(Request $request)
    {
        BukuModel::where("id_buku", $request->id_buku)->delete();

        return redirect()->route('buku')->with('pesan','data berhasil di hapus');
    }

    public function detail($id_buku){
        $data = [
            "buku" => BukuModel::where("id_buku", $id_buku)->first(),
            "kategori" => KategoriModel::orderBy("nama_kategori", "DESC")->get()
        ];

        return view("/admin/buku/detail_buku", $data);
    }
}
