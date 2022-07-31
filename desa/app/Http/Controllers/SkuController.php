<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sku;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            //desc berdasarkan data yang masuk terakhir, esc berdasarkan abjad atau nomor urutan
            "data_sku" => Sku::orderBy("id","DESC")->get()
        ];

        return view("/admin/sku/data_sku", $data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function proses_tambah_sku(Request $request)
    {
        //untuk tanbah
        // dd($request);
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
        sku::create([
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
            return redirect("/sku");
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
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $agama = $request->agama;
        $alamat = $request->alamat;
        $pekerjaan = $request->pekerjaan;
        $keterangan = $request->keterangan;
        $nohp = $request->nohp;

        sku::where('id', $id)->update([

            'nama' =>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'jenis_kelamin'=>$jenis_kelamin,
            'agama'=>$agama,
            'alamat'=>$alamat,
            'pekerjaan'=>$pekerjaan,
            'keterangan'=>$keterangan,
            'nohp'=>$nohp
        ]);

        return redirect('/sku');
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
        Sku::where("id", $id)->delete();

        return redirect()->back();
    }
    public function form_tambah_sku()
    {
        return view("admin/sku/form_tambah_sku");

    }
    public function tampilan($id){
        $data = [
            "sku" => sku::where("id", $id)->first()
        ];

        return view('/admin/sku/edit_sku',$data);

    }

    public function rekap(Request $request)
    {
        $rekap = sku::whereBetween('created_at', [$request->tglm, $request->tgls])->count();

        return response()->json([
            'jumlah' => $rekap
        ]);
    }
}
