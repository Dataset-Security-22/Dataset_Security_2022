<?php

namespace App\Http\Controllers;

use App\Models\Oprec;

use Illuminate\Http\Request;

class OprecController extends Controller
{
    public function tambahOprec(Request $request)
    {
        $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->nama)));
        $extension = $request->gambar->extension();
        $gambar = time() . "_" . $slug . "." . $extension;
        $request->gambar->storeAs('public/oprec/', $gambar);
        Oprec::create([
            "nim"       => $request->nim,
            "nama"      => $request->nama,
            "tempat"    => $request->tempat,
            "ttl"       => $request->ttl,
            "no_telp"   => $request->no_telp,
            "email"     => $request->email,
            "jurusan"   => $request->jurusan,
            "alasan"    => $request->alasan,
            "gambar"    => $gambar
        ]);
        return view('mahasiswa.home');
    }

    public function test()
    {
        echo "string";
    }

    public function diterima($id, $no_telp)
    {
        if ($id) {
            Oprec::where('id', $id)->update([
                'diterima' => 1
            ]);
            echo "<script>location.href='https://api.whatsapp.com/send?phone=$no_telp&text=Hallo Sobat UKM SEBURA!!!%0ASelamat Anda diterima dalam Open Recruitmen UKM SEBURA, Selanjutnya anda diminta untuk menghadiri kegiatan wawancara%0ATempat : Gedung Study Center Lt.4%0ATanggal : Selasa, 28 Desember 2021%0AWaktu : 16.00-selesai%0ATerimakasih and good luck gaiss!!!'</script>";
        } else {
            echo "<script>alert('Gagal diterima')</script>";
        }
    }

    public function ditolak($id, $no_telp)
    {
        if ($id) {
            Oprec::where('id', $id)->update([
                'ditolak' => 2
            ]);
            echo "<script>location.href='https://api.whatsapp.com/send?phone=$no_telp&text=Hallo Sobat UKM SEBURA%0A%0AMohon maaf kali ini anda belum bisa kami Terima:(( tetapi jangan berkecil hati yaa! semoga beruntung dilain waktu!!!'</script>";
        } else {
            echo "<script>alert('Gagal ditolak')</script>";
        }
    }

    public function hapus(Request $request, $id)
    {
        Oprec::where("id", $request->id)->delete();
        return redirect()->back()
            ->with('success', "<script>alert('Post deleted successfully')</script>");
    }
}
