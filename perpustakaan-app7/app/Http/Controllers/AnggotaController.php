<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use Facade\FlareClient\View;
use PhpParser\Builder\Function_;

class AnggotaController extends Controller
{
    //  public function __construct(){
    //     $this->AnggotaModel = new AnggotaModel();
    // }
    public function index(){
        $data = [

            "anggota" => AnggotaModel::orderBy("nama_anggota")->get()
        ];
        return view('/admin/anggota/v_anggota', $data);
    }

    public function detail($id_anggota){
        $data = [
            "anggota" => AnggotaModel::where("id_anggota", $id_anggota)->first(),

        ];

        return view("/admin/anggota/v_detailanggota", $data);
    }
    public function kodeAnggota(){

        $select =  AnggotaModel::max('nis');
        $nis = $select;

        $noUrut = (int) substr($nis, 3,3);
        $noUrut++;
        $kode = "10";
        $hasil = $kode .sprintf("%03s", $noUrut);

        return $hasil;

    }

    public function add(){
        $data = [
            "kode" => $this->kodeAnggota(),
        ];
        return view('/admin/anggota/v_addanggota',$data);
    }

    public function insert(Request $request){

        $message = [
            'nis.required' => 'wajib diisi!!',
            'nis.unique' => 'id anggota ini sudah ada!!!',
            'nis.min' => 'Min 4 Karakter',
            'nis.max' => 'Max 7 Karakter',
            'nama_anggota.required' => 'wajib diisi!!',
            'alamat.required' => 'wajib diisi!!',
            'ttl_anggota.required' => 'wajib diisi!!',
            'no_hp.required' => 'wajib diisi!!',
            'no_hp.numeric' => 'harus pakai angka!!',


        ];

        $this->validate($request, [
            'nis' => 'required|unique:anggota,id_anggota|min:4|max:7',
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'ttl_anggota' => 'required',

            'no_hp' => 'required',
        ], $message);



        AnggotaModel::create($request->all());

        return redirect()->route('anggota')->with('pesan','data berhasil di tambahkan');
    }

    public function edit($id_anggota){
        $data = [
            "edit" => AnggotaModel::where("id_anggota", $id_anggota)->first(),
            "anggota" => AnggotaModel::where("id_anggota", "!=" , $id_anggota)->get(),

        ];

        return view("/admin/anggota/v_editanggota", $data);
    }

    public function update(Request $request)
    {
        $message = [
            'nis.required' => 'wajib diisi!!',
            'nis.unique' => 'id anggota ini sudah ada!!!',
            'nis.min' => 'Min 4 Karakter',
            'nis.max' => 'Max 7 Karakter',
            'nama_anggota.required' => 'wajib diisi!!',
            'alamat.required' => 'wajib diisi!!',
            'tll_anggota.required' => 'wajib diisi!!',
            'no_hp.required' => 'wajib diisi!!',
            'no_hp.numeric' => 'harus pakai angka!!',



            ];

            $this->validate($request, [
                'nis' => 'required|unique:anggota,id_anggota|min:4|max:7',
                'nama_anggota' => 'required',
                'alamat' => 'required',
                'ttl_anggota' => 'required',
                'no_hp' => 'required|numeric',
            ], $message);

            AnggotaModel::where("id_anggota", $request->id_anggota)->update([
                "nis" => $request->nis,
                "nama_anggota" => $request->nama_anggota,
                "alamat" => $request->alamat,
                "ttl_anggota" => $request->ttl_anggota,
                'no_hp'=> $request->no_hp,
            ]);

        return redirect("/anggota");
    }

    public function delete(Request $request)
    {
        AnggotaModel::where("id_anggota", $request->id_anggota)->delete();

        return redirect()->route('anggota')->with('pesan','data berhasil di hapus');
    }

    // public function detail($id_anggota){
    //     // if (!$this->anggotaModel->detailData($id_anggota)) {
    //     //     abort(404);
    //     // }
    //     $data =[
    //         'anggota' => $this->AnggotaModel->detailData($id_anggota),
    //     ];
    //     return view('v_detailanggota', $data);
    // }
    // public function detail($id_anggota){
    //     if (!$this->AnggotaModel->detailData($id_anggota)) {
    //         abort(404);
    //     }
    //     $data =[
    //         'anggota' => $this->AnggotaModel->detailData($id_anggota),
    //     ];
    //     return view('/admin/anggota/v_detailanggota', $data);
    // }

    // public function add(){
    //     return view('/admin/anggota/v_addanggota');
    // }


    // public function insert(){
    //     Request()->validate([
    //     'nis' => 'required|unique:anggota,id_anggota|min:4|max:7',
    //     'nama_anggota' => 'required',
    //     'alamat' => 'required',
    //     'ttl_anggota' => 'required',
    //     'status_anggota' => 'required',
    //     'NoHp' => 'required',
    // ],[
    //     'nis.required' => 'wajib diisi!!',
    //     'nis.unique' => 'id anggota ini sudah ada!!!',
    //     'nis.min' => 'Min 4 Karakter',
    //     'nis.max' => 'Max 7 Karakter',
    //     'nama_anggota.required' => 'wajib diisi!!',
    //     'alamat.required' => 'wajib diisi!!',
    //     'tll_anggota.required' => 'wajib diisi!!',
    //     'status_anggota.required' => 'wajib diisi!!',
    // ]);
    //  //jika validasi tidak ada maka  simpan data
    //     //upload gambar/foto
    //     // $file = Request()->foto_anggota;
    //     // $fileName = Request()->nis . '.' . $file->extension();
    //     // $file->move(public_path('foto_anggota'), $fileName);


    //     $data = [
    //         'nis' => Request()->nis,
    //         'nama_anggota' => Request()->nama_anggota,
    //         'alamat' => Request()->alamat,
    //         'ttl_anggota' => Request()->status_anggota,
    //         'status_anggota' => Request()->status_anggota,
    //         'NoHp' => Request()->NoHp,
    //     ];

    //     $this->AnggotaModel->addData($data);
    //     return redirect()->route('anggota')->with('pesan','data berhasil di tambahkan');
    // }

    // public function edit($id_anggota){
    //     if (!$this->AnggotaModel->detailData($id_anggota)) {
    //         abort(404);
    //     }
    //     $data =[
    //         'anggota' => $this->AnggotaModel->detailData($id_anggota),
    //     ];
    //     return view('/admin/anggota/v_editanggota', $data);
    // }

    // public function update($id_anggota){
    //     Request()->validate([
    //     'nis' => 'required|unique:anggota,id_anggota|min:4|max:7',
    //     'nama_anggota' => 'required',
    //     'alamat' => 'required',
    //     'ttl_anggota' => 'required',
    //     'status_anggota' => 'required',
    //     'NoHp' => 'required',
    // ],[
    //     'nis.required' => 'wajib diisi!!',
    //     'nis.unique' => 'kode anggota ini sudah ada!!!',
    //     'nis.min' => 'Min 4 Karakter',
    //     'nis.max' => 'Max 7 Karakter',
    //     'nama_anggota.required' => 'wajib diisi!!',
    //     'alamat.required' => 'wajib diisi!!',
    //     'ttl_anggota.required' => 'wajib diisi!!',
    //     'status_anggota.required' => 'wajib diisi!!',
    //     'NoHp.required' => 'wajib diisi!!',
    // ]);
    //  //jika validasi tidak ada maka  simpan data
    //     //upload gambar/foto
    //     // $file = Request()->foto_anggota;
    //     // $fileName = Request()->nis . '.' . $file->extension();
    //     // $file->move(public_path('foto_anggota'), $fileName);


    //     $data = [
    //         'nis' => Request()->nis,
    //         'nama_anggota' => Request()->nama_anggota,
    //         'alamat' => Request()->alamat,
    //         'ttl_anggota' => Request()->status_anggota,
    //         'status_anggota' => Request()->status_anggota,
    //         'NoHp' => Request()->NoHp,
    //     ];

    //     $this->AnggotaModel->editData($id_anggota, $data);
    //     return redirect()->route('anggota')->with('pesan','data berhasil di update');
    // }

    // public function delete($id_anggota){
    //     $this->AnggotaModel->deleteData($id_anggota);
    //     return redirect()->route('anggota')->with('pesan','data berhasil di hapus');
    // }
}
