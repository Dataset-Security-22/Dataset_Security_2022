<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Facade\FlareClient\View;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $data = [

            "users" => User::orderBy("id", "DESC")->get()
        ];
        if(auth()->user()->id_role == 1)
        return view('/admin/petugas/v_petugas', $data);

    }

    // public function add(){
    //     $data = [
    //         "users" => User::orderBy("name", "DESC")->get()
    //     ];
    //     return view('v_addpetugas', $data);
    // }

    public function add(){
        $data = [
            "roles" => Role::orderBy("nama", "DESC")->get()
        ];
        return view('/admin/petugas/v_addpetugas', $data);
    }

    public function insert(Request $request){

        $message = [
            'name.required' => 'wajib diisi!!',
            'name.min' => 'Min 4 Karakter',
            'email.required' => 'wajib diisi!!',
            'email.email' => 'masukan email yang benar',
            'email.unique' => 'email ini sudah ada!!!',
            'password.required' => 'wajib diisi!!',
            'password.min' => 'Min 5 Karakter',
            'password.max' => 'Max 255 Karakter',

        ];

        $this->validate($request, [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ], $message);


        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" => $request->id_role,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route('petugas')->with('pesan','data berhasil di tambahkan');
    }

    public function edit($id){
        $data = [
            "data_role" => Role::orderBy("nama", "ASC")->get(),
            "edit" => User::where("id", $id)->first(),
            "users" => User::where("id", "!=" , $id)->get(),
            //"kategori" => KategoriModel::orderBy("nama_kategori", "DESC")->get()
        ];

        return view("/admin/petugas/v_editpetugas", $data);
    }

    public function update(Request $request){

        $message = [
            'name.required' => 'wajib diisi!!',
            'name.min' => 'Min 4 Karakter',
            'email.required' => 'wajib diisi!!',
            'email.email' => 'masukan email yang benar',
            'email.unique' => 'email ini sudah ada!!!',
            'password.required' => 'wajib diisi!!',
            'password.min' => 'Min 5 Karakter',
            'password.max' => 'Max 255 Karakter',

        ];

        $this->validate($request, [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ], $message);


        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),

        ]);
        // $data = [
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "password" => hash::make($request->password),
        // ];
        // DB::table('users')->insert($data);

        return redirect()->route('petugas')->with('pesan','data berhasil di tambahkan');
    }

    public function delete(Request $request)
    {
        User::where("id", $request->id)->delete();

        return redirect()->route('petugas')->with('pesan','data berhasil di hapus');
    }


}
