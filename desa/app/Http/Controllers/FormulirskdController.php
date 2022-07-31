<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\skd;
// use App\Models\penduduk;

class FormulirskdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("formulirskd");
    }

    // public function namaskd(Request $request)
    // {
    //     $penduduk = penduduk::select('nama')->where('nama', 'like', '%'.$request->term.'%')->get();

    //     $data = array();

    //     foreach ($penduduk as $p){
    //         $data[] = $p->nama;
    //     }
    //     return response()->json($data);
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formulir(Request $request)
    {
        $message = [
            'nama.required' =>'Tidak Boleh Kosong',
            'tempat_lahir.required'=>'Tidak Boleh Kosong',
            'tanggal_lahir.required'=>'Tidak Boleh Kosong',
            'jenis_kelamin.required'=>'Tidak Boleh Kosong',
            'agama.required'=>'Tidak Boleh Kosong',
            'pekerjaan.required'=>'Tidak Boleh Kosong',
            'alamat.required'=>'Tidak Boleh Kosong',
            'keterangan.required'=>'Tidak Boleh Kosong',
            'nohp.required'=>'Tidak Boleh Kosong'
        ];

        $this->validate($request, [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'nohp' => 'required',
        ], $message);

        // $nama = $request->nama;

        // $penduduk = penduduk::where('nama', $nama)->first();

        // if ($penduduk) {
            skd::create ([
                'nama' =>$request->nama,
                'tempat_lahir'=>$request->tempat_lahir,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'agama'=>$request->agama,
                'pekerjaan'=>$request->pekerjaan,
                'alamat'=>$request->alamat,
                'keterangan'=>$request->keterangan,
                'nohp'=>$request->nohp
                ]);
                return redirect('formulirskd')->with('pesan','pengajuan surat telah diterima');
        // } else {
        //     return redirect('formulirskd')->with('pesan','pengajuan surat tidak dapat diterima');
        // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }
}
