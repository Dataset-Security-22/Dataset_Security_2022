<?php

namespace App\Http\Controllers\API;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = [

            "contacts" => contact::orderBy("name")->get()
        ];
        // return view('/admin/kontak', $data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
    }

    public function detail($id_anggota){
        $data = [
            "anggota" => AnggotaModel::where("id_anggota", $id_anggota)->first(),

        ];

        // return view("/admin/anggota/v_detailanggota", $data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
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
        // return view('/admin/anggota/v_addanggota',$data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
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

        // return view("/admin/anggota/v_editanggota", $data);
        return response()->json(['messege' => 'request success', 'data' => $data['edit']],200);

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

}
