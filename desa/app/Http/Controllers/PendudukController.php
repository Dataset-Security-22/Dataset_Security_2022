<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data_penduduk" => penduduk::all()
        ];

        return view("/penduduk", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tampilan($id){
        $data = [
            "penduduk" => penduduk::where("id", $id)->first()
        ];

        return view('/edit_penduduk',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function proses_tambah_penduduk(Request $request)
    {
        //untuk tanbah
        // dd($request);
        $message = [
            'nama.required' =>'Tidak Boleh Kosong',
            'nik.required'=>'Tidak Boleh Kosong',
            'jenis_kelamin.required'=>'Tidak Boleh Kosong',
            'kewarganegaraan.required'=>'Tidak Boleh Kosong',
            'agama.required'=>'Tidak Boleh Kosong',
            'alamat.required'=>'Tidak Boleh Kosong',

        ];

        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',

        ], $message);
        penduduk::create([
            'nama' =>$request->nama,
            'nik' =>$request->nik,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'kewarganegaraan' =>$request->kewarganegaraan,
            'agama'=>$request->agama,
            'alamat'=>$request->alamat


            ]);
            return redirect("/penduduk");
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $nama = $request->nama;
        $nik = $request->nik;
        // $tempat_lahir = $request->tempat_lahir;
        // $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $kewarganegaraan = $request->kewarganegaraan;
        $agama = $request->agama;
        $alamat = $request->alamat;
        // $pekerjaan = $request->pekerjaan;
        // $status_kawin = $request->status_kawin;
        // $keterangan = $request->keterangan;

        penduduk::where('id', $id)->update([

            'nama' =>$nama,
            'nik' =>$nik,
            // 'tempat_lahir'=>$tempat_lahir,
            // 'tanggal_lahir'=>$tanggal_lahir,
            'jenis_kelamin'=>$jenis_kelamin,
            'kewarganegaraan' =>$kewarganegaraan,
            'agama'=>$agama,
            'alamat'=>$alamat
            // 'pekerjaan'=>$pekerjaan,
            // 'status_kawin'=>$status_kawin,
            // 'keterangan'=>$keterangan
        ]);

        return redirect('/penduduk');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penduduk::where("id", $id)->delete();

        return redirect()->back();
    }
    public function form_tambah_penduduk()
    {
        return view("/form_tambah_penduduk");

    }
}
