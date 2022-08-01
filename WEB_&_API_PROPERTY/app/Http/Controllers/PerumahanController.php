<?php

namespace App\Http\Controllers;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;
// use Alert;
use File;

use Illuminate\Http\Request;

class PerumahanController extends Controller
{
    public function index()
    {
        $data = [
            "perumahan" => Perumahan::where('id_user', Auth::user()->id)->get()
        ];

        return view("owner.perumahan.data_perumahan", $data);
    }



    public function tambah(Request $request)
    {
        if ($request->file("foto")) {
            $coba = $request->file("foto")->store("image");
        }

        Perumahan::create([
            "nama_perumahan" => $request->nama_perumahan,
            "alamat" => $request->alamat,
            // "stok" => $request->stok,
            "uraian" => $request->uraian,
            "foto" => $coba,
            "id_user" => Auth::user()->id
        ]);
        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);

        // Alert::success('Success', 'Data Berhasil di Tambahkan');
        // toast('Signed in successfully','success')->timerProgressBar();
        // alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusCancel(true);  hapus
        // example:
        // alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusConfirm(true);
        // alert()->success('Post Created', 'Successfully')->buttonsStyling(false); ok
        // alert()->info('InfoAlert','Lorem ipsum dolor sit amet.')->animation('tada faster','fadeInUp faster');
        //
        // alert('Success','Data Berhasil di Tambahkan', 'success')->background('#EEF0F3')->autoClose(2000);

        // alert()->success('Post Created', 'Successfully')->toToast();
//         alert()->question('Are you sure?','You won\'t be able to revert this!')
// ->showConfirmButton('Yes! Delete it', '#3085d6')
// ->showCancelButton('Cancel', '#aaa')->reverseButtons();


        // return redirect()->back();
        // return back()->with('message', "<script>swal('Selamat!', 'Data Berhasil di Tambahkan', 'success')</script>");

    }

    public function hapus(Request $request)
    {
        Perumahan::where("id", $request->id)->delete();
        // return redirect()->back();
        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Perumahan::where("id", $request->id)->first(),
            // "perumahan" => Perumahan::where("id", "!=", $id)->orderBy("nama_perumahan", "ASC")->get()
        ];

        return view("/owner/perumahan/edit_perumahan", $data);
    }



    public function simpan(Request $request)
    {
        if ($request->file("foto")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $coba = $request->file("foto")->store("image");
        }else{
            $coba = $request->oldImage;
        }


        Perumahan::where("id", $request->id)->update([
            "nama_perumahan" => $request->nama_perumahan,
            "alamat" => $request->alamat,
            // "stok" => $request->stok,
            "uraian" => $request->uraian,
            "foto" => $coba
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }
}
