<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Divisi;
use App\Models\Model\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
    	$data = [
    		"data_divisi" => Divisi::orderBy("nim_anggota", "DESC")->get(),
    		"data_absen" => Absensi::orderBy("tgl_absen", "DESC")->get()
    	];

    	return view("/page/bph/absen/data_absensi", $data);
    }

    public function tambah(Request $request)
    {
        $message = [
            "required" => "Kolom :attribute tidak boleh kosong"
        ];

        $this->validate($request, [
            "absen_status" => "required"
        ], $message);

        $absen = new Absensi;
        $absen->id_users = auth()->user()->id;
        $absen->nim_anggota = $request->nim_anggota;
        $absen->tanggal_absen = date("Y-m-d");
        $absen->status_absen = $request->status_absen;
        if ($absen->status_absen == 1) {

            $absen->keterangan = "Hadir";

        }else if($absen->status_absen == 4) {

            $absen->keterangan = "Tidak Ada Keterangan";

        }else if($absen->status_absen == 2) {
            $this->validate($request, [
                "keterangan" => "required"
            ], $message);

            return redirect()->back();
        }
        $absen->save();

        return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function data_absen()
    {
        $data = [
            "data_divisi" => Divisi::orderBy("nim_anggota", "DESC")->get(),
            "data_absen" => Absensi::orderBy("tanggal_absen", "DESC")->get()
        ];

        return view("page/bph/absen/data_absen_sekarang", $data);
    }

    public function simpan_data_absen(Request $request)
    {
        if ($request->status_absen == 1)
        {
            $keterangan = "Hadir";
        } else {
            $keterangan = $request->keterangan;
        }

        Absensi::create([
            "id_users" => auth()->user()->id,
            "tanggal_absen" => date("Y-m-d"),
            "status_absen" => $request->status_absen,
            "keterangan" => $keterangan,
            "nim_anggota" => $request->nim_anggota
        ]); 

        return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function data_absen_pertanggal()
    {
        $data = [
            "data_divisi" => Divisi::all(),
            "data_absen" => Absensi::orderBy("tanggal_absen", "DESC")->get()
        ];

        return view("page/bph/absen/data_absen_pertanggal", $data);
    }

    public function simpan_data_absen_pertanggal(Request $request)
    {
        if ($request->status_absen == 1)
        {
            $keterangan = "Hadir";
        } else {
            $keterangan = $request->keterangan;
        }

        Absensi::create([
            "id_users" => auth()->user()->id,
            "tanggal_absen" => date("Y-m-d"),
            "status_absen" => $request->status_absen,
            "keterangan" => $keterangan,
            "nim_anggota" => $request->nim_anggota
        ]); 

        return redirect()->back();
    }

    public function edit_absen_pertanggal(Request $request)
    {

        $data = [
            "edit" => Absensi::where("id_absensi", $request->id_absensi)->first(),
            "data_divisi" => Divisi::all()
        ];

        return view("page/bph/absen/edit_absen_pertanggal", $data);
    }

    public function edit_data_absen_pertanggal(Request $request)
    {
        Absensi::where("id_absensi", $request->id_absensi)->update([
            "tanggal_absen" => $request->tanggal_absen,
            "status_absen" => $request->status_absen,
            "keterangan" => $request->keterangan
        ]);

        return redirect()->back();
    }

    public function laporan_data_absen()
    {
        $data = [
            "data_divisi" => Divisi::orderBy("id_divisi", "DESC")->get()
        ];

        return view("page/bph/laporan/data_absen", $data);
    }

    public function detail_laporan_absensi($id_divisi)
    {
        $data = [
            "detail" => Divisi::where("id_divisi", $id_divisi)->first()
        ];

        return view("page/bph/laporan/detail_laporan_absen", $data);
    }

    public function get_absen()
    {
        $divisi = Divisi::orderBy("nim_anggota", "DESC")->get();

        $data = array();

        $no = 1;
        foreach ($divisi as $d) {
            $data[] = array(
                'nomer' => $no++,
                'id_divisi' => $d->id_divisi,
                'id_bagian' => $d->id_bagian,
                'nim_anggota' => $d->nim_anggota,
                'id_jabatan' => $d->id_jabatan
            );
        }

        return response()->json($data);
    }

    public function simpan(Request $request)
    {
        if ($request->status_absen == 1 ) {
            $keterangan = "Hadir";
        } else {
            $keterangan = $request->keterangan;
        }

        Absensi::create([
            "id_users" => $request->id_users,
            "tgl_absen" => $request->tgl_absen,
            "status_absen" => $request->status_absen,
            "keterangan" => $keterangan,
            "nim_anggota" => $request->nim_anggota
        ]);

        return redirect()->back()->with("sukses", "Data Berhasil di Tambahkan");
    }

    public function ubah(Request $request)
    {
        $data = [
            "divisi" => Divisi::where("id_divisi", $request->id_divisi)->first()
        ];

        return view("/page/bph/absen/edit_data_absen", $data);
    }

    public function rekap_absen()
    {
        $data = [
            "data_divisi" => Divisi::orderBy("id_divisi", "ASC")->paginate(10)
        ];

        return view("page/admin/absen/rekap_absen", $data);
    }
}
