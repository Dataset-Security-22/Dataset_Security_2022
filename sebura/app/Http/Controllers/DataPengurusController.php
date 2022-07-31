<?php

namespace App\Http\Controllers;

use App\Models\DataPengurus;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Prodi;
use App\Models\Divisi;
use App\Models\Role;

class DataPengurusController extends Controller
{
    public function index()
    {
        $datapengurus = DataPengurus::all();
        return view('admin.pengurus.kepengurusan', compact('datapengurus'));
    }

    public function form_tambah_pengurus()
    {
        $jabatan = Jabatan::all();
        $prodi = Prodi::all();
        $divisi = Divisi::all();
        $roles = Role::all();
        return view('admin.pengurus.form_tambah_pengurus', compact('jabatan', 'prodi', 'divisi', 'roles'));
    }

    public function tambah(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->nama)));
            $extension = $request->gambar->extension();
            $gambar = time() . "_" . $slug . "." . $extension;
            $request->gambar->storeAs('data_pengurus/', $gambar);
            if ($request->file('gambar')->isValid()) {
                DataPengurus::create([
                    "nama" => $request->nama,
                    "email" => $request->email,
                    "password" => bcrypt($request->password),
                    "role" => $request->role,
                    "divisi_sebura" => $request->divisi,
                    "jabatan" => $request->jabatan,
                    "prodi" => $request->prodi,
                    "tahun_kepengurusan" => $request->tahun_kepengurusan,
                    "gambar" => $gambar
                ]);
                return redirect("/admin/kepengurusan")->with('success', 'Post updated successfully');
            } else {
                return redirect('/admin/form_tambah_pengurus')->with('error', 'File Photo Salah');
            }
        } else {
            return redirect('/admin/form_tambah_pengurus')->with('error', 'Masukan Photo Dahulu');
        }
    }

    public function hapus_kepengurusan(Request $request)
    {
        DataPengurus::where("id", $request->id)->delete();

        return redirect()->back()
            ->with('success', "<script>alert('Post deleted successfully')</script>");
    }

    public function form_edit_pengurus($id)
    {
        $data = DataPengurus::findOrfail($id);
        $jabatan = Jabatan::all();
        $prodi = Prodi::all();
        $divisi = Divisi::all();

        // return $data;
        return view('admin.pengurus.edit_pengurus')->with([
            'data' => $data,
            'jabatan' => $jabatan,
            'prodi' => $prodi,
            'divisi_sebura' => $divisi
        ]);
    }

    // public function update(Request $request)
    // {
    //     if ($request->hasFile('gambar')) {
    //         $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($request->nama)));
    //         $extension = $request->gambar->extension();
    //         $gambar = time() . "_" . $slug . "." . $extension;
    //         $request->gambar->storeAs('public/data_pengurus/', $gambar);
    //         if ($request->file('gambar')->isValid()) {
    //             DataPengurus::where('id', $request->id)->update([
    //                 "nama" => $request->nama,
    //                 "divisi_sebura" => $request->divisi,
    //                 "jabatan" => $request->jabatan,
    //                 "prodi" => $request->prodi,
    //                 "tahun_kepengurusan" => $request->tahun_kepengurusan,
    //                 "gambar" => $gambar
    //             ]);
    //             return redirect("/admin/kepengurusan")->with('success', 'Post updated successfully');
    //         } else {
    //             return redirect('/admin/form_tambah_pengurus')->with('error', 'File Photo Salah');
    //         }
    //     } else {
    //         return redirect('/admin/form_tambah_pengurus')->with('error', 'Masukan Photo Dahulu');
    //     }
    // }

    public function update(Request $request)
    {
        if ($request->gambar == "") {
            DataPengurus::where('id', $request->id)->update([
                "nama" => $request->nama,
                "divisi_sebura" => $request->divisi,
                "jabatan" => $request->jabatan,
                "prodi" => $request->prodi,
                "tahun_kepengurusan" => $request->tahun_kepengurusan,
                "gambar" => $request->gambar_dulu
            ]);

            return redirect("/admin/kepengurusan")->with('success', 'Post updated successfully');
        } else if ($request->gambar != "") {

            $slug = preg_replace(
                '/[^a-z0-9]+/i',
                '-',
                trim(strtolower($request->nama))
            );
            $extension = $request->gambar->extension();
            $gambar = time() . "_" . $slug . "." . $extension;
            $request->gambar->storeAs('public/data_pengurus/', $gambar);
            DataPengurus::where('id', $request->id)->update([
                "nama" => $request->nama,
                "divisi_sebura" => $request->divisi,
                "jabatan" => $request->jabatan,
                "prodi" => $request->prodi,
                "tahun_kepengurusan" => $request->tahun_kepengurusan,
                "gambar" => $gambar
            ]);

            return redirect("/admin/kepengurusan")->with('success', 'Post updated successfully');
        } else {
            return redirect("/admin/kepengurusan")->with('warning', 'hallo');
        }
    }
}
