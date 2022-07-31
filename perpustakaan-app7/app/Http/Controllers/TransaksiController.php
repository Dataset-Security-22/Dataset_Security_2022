<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Facade\FlareClient\View;
use PhpParser\Builder\Function_;
use App\Models\BukuModel;
use App\Models\User;
use App\Models\AnggotaModel;
use App\Models\Peminjaman;
use App\Models\DendaModel;


class TransaksiController extends Controller
{
    public function index(){
        $data = [

            "denda" => DendaModel::orderBy("denda", "DESC")->get(),
            //"transaksi" => Transaksi::orderBy("tanggal_pinjam", "DESC")->get()
            "transaksi" => Transaksi::orderBy("id_transaksi", "DESC")->get()

        ];
        return view('/admin/transaksi/v_transaksi', $data);

    }

    public function kode(){

        $select =  Transaksi::max('kode_transaksi');
        $kodeTransaksi = $select;

        $noUrut = (int) substr($kodeTransaksi, 3,3);
        $noUrut++;
        $kode = "KP-";
        $hasil = $kode . sprintf("%03s", $noUrut);

        return $hasil;

    }

    public function form_peminjaman()
    {
    	$data = [
            "kode" => $this->kode(),
    		"data_buku" => BukuModel::get(),
    		"data_anggota" => AnggotaModel::get()
    	];

    	return view("/admin/transaksi/form_peminjaman", $data);
    }

    public function simpan_peminjaman(Request $req)
    {
        $message = [
            'kode_transaksi.required' => 'wajib diisi!!',

            'kode_buku.required' => 'wajib diisi!!',
            'id_anggota.required' => 'wajib diisi!!',
            'tanggal_pinjam.required' => 'wajib diisi!!',
            'tanggal_kembali.required' => 'wajib diisi!!',
            'id_petugas.required' => 'wajib diisi!!',

            ];

            $this->validate($req, [
                'kode_transaksi' => 'required',
                'kode_buku' => 'required',
                'id_anggota' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'id_petugas' => 'required',
            ], $message);

    	Transaksi::create([
    		"kode_transaksi" => $req->kode_transaksi,
    		"kode_buku" => $req->kode_buku,
    		"id_anggota" => $req->id_anggota,
    		"tanggal_pinjam" => $req->tanggal_pinjam,
    		"tanggal_kembali" => $req->tanggal_kembali,
    		//"tanggal_mengembalikan" => $req->tanggal_mengembalikan,
    		// "denda" => $req->denda,
    		"id_petugas" => $req->id_petugas
    	]);

    	return redirect()->route('transaksi')->with('pesan','data berhasil di tambahkan');
    }

    public function form_pengembalian()
    {
        echo "string";
    }

    public function detail($id_transaksi){
        $data = [
            "transaksi" => Transaksi::where("id_transaksi", $id_transaksi)->first(),
    		"data_buku" => BukuModel::get(),
    		"data_anggota" => AnggotaModel::get()
    	];

        return view("/admin/transaksi/v_detail", $data);
    }

    public function update(Request $req){

        Transaksi::where("id_transaksi", $req->id_transaksi)->update([
            "kode_transaksi" => $req->kode_transaksi,
    		//"kode_buku" => $req->kode_buku,
    		//"id_anggota" => $req->id_anggota,
    		"tanggal_pinjam" => $req->tanggal_pinjam,
    		"tanggal_kembali" => $req->tanggal_kembali,
    		"tanggal_mengembalikan" => $req->tanggal_mengembalikan,
    		// "denda" => $req->denda,
    		"id_petugas" => $req->id_petugas
        ]);
        return redirect("/transaksi");
    }

    public function bayar_denda($id_transaksi)
    {
        $data = [
            "detail" => Transaksi::where("id_transaksi", $id_transaksi)->first()
        ];

        return view("/admin/transaksi/bayar_denda", $data);
    }

    public function pengembalian(Request $request)
    {
        Transaksi::where("id_transaksi", $request->id_transaksi)->update([
            "tanggal_mengembalikan" => date("Y-m-d")
        ]);

        return redirect()->back();
    }

    public function simpan_bayar_denda(Request $request)
    {
        Transaksi::where("id_transaksi", $request->id_transaksi)->update([
            "denda" => $request->denda
        ]);

        return redirect("/transaksi");
    }
    public function hapus(Request $request)
    {
        Transaksi::where("id_transaksi", $request->id_transaksi)->delete();

        return redirect()->route('transaksi')->with('pesan','data berhasil di hapus');
    }

    // public function cetakForm(){
    //     return view('/admin/transaksi/cetak-laporan');
    // }

    // public function cetakDataPertanggal($tglawal, $tglahir) {
    //     dd(["tanggal Awal: ".$tglawal, "tanggal Akhir : ".$tglahir ]);
    // }

    public function rekap ( request $request ){
        $rekap = Transaksi::whereBetween('tanggal_pinjam', [$request->tglm, $request->tgls])->count();
        $denda = Transaksi::sum('denda');
        return response()->json([
            'jumlah' => $rekap,
            'denda'  => $denda
        ]);
    }

}
