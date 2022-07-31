<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Models\PetugasModel;
use Facade\FlareClient\View;
use PhpParser\Builder\Function_;

class PetugasController extends Controller
{
    public function __construct(){
        $this->PetugasModel = new PetugasModel();
    }

    public function index(){
        $data =[
            'users' => $this->PetugasModel->allData(),
        ];
        return view('v_petugas', $data);
    }

    public function detail($id){
        if (!$this->AnggotaModel->detailData($id)) {
            abort(404);
        }
        $data =[
            'users' => $this->AnggotaModel->detailData($id),
        ];
        return view('v_detailanggota', $data);
    }

    public function add(){
        return view('v_addpetugas');
    }

    public function insert(){
        Request()->validate([
        'name' => 'required|min:4|max:255',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',

    ],[
        'name.required' => 'wajib diisi!!',
        'name.min' => 'Min 4 Karakter',
        'email.required' => 'wajib diisi!!',
        'email.email' => 'masukan email yang benar',
        'email.unique' => 'email ini sudah ada!!!',
        'password.required' => 'wajib diisi!!',
        'password.min' => 'Min 5 Karakter',
        'password.max' => 'Max 255 Karakter',
    ]);
     //jika validasi tidak ada maka  simpan data
        //upload gambar/foto
        // $file = Request()->foto_buku;
        // $fileName = Request()->kode_buku . '.' . $file->extension();
        // $file->move(public_path('foto_buku'), $fileName);


        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => Hash::make (Request()->password),

        ];


        $this->PetugasModel->addData($data);
        return redirect()->route('petugas')->with('pesan','data berhasil di tambahkan');
    }

    public function edit($id){
        if (!$this->PetugasModel->detailData($id)) {
            abort(404);
        }
        $data =[
            'users' => $this->PetugasModel->detailData($id),
        ];
        return view('v_editpetugas', $data);
    }

    public function update($id){
        Request()->validate([
        'name' => 'required|min:4|max:255',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
    ],[
        'name.required' => 'wajib diisi!!',
        'name.min' => 'Min 4 Karakter',
        'email.required' => 'wajib diisi!!',
        'email.email' => 'masukan email yang benar',
        'email.unique' => 'email ini sudah ada!!!',
        'password.required' => 'wajib diisi!!',
        'password.min' => 'Min 5 Karakter',
        'password.max' => 'Max 255 Karakter',
    ]);
     //jika validasi tidak ada maka  simpan data
        //upload gambar/foto
        // $file = Request()->foto_buku;
        // $fileName = Request()->kode_buku . '.' . $file->extension();
        // $file->move(public_path('foto_buku'), $fileName);


        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => Hash::make (Request()->password),
        ];

        $this->PetugasModel->editData($id, $data);
        return redirect()->route('petugas')->with('pesan','data berhasil di update');
    }

    public function delete($id){
        $this->PetugasModel->deleteData($id);
        return redirect()->route('petugas')->with('pesan','data berhasil di hapus');
    }

}
