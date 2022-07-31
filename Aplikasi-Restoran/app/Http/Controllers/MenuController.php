<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use File;

class MenuController extends Controller
{
    public function data_menu()
    {
        $data["data_menu"] = Menu::get();

        return view("content.menu.data_menu", $data);
    }

    public function simpan_data_menu(Request $req)
    {
        $save = Menu::create($req->all());

        $file = $req->file("foto_menu");
        $fileName = $file->getClientOriginalName();
        $req->file("foto_menu")->move("public/img_menu", $fileName);

        $save->foto_menu = $fileName;
        $save->save();

        return redirect()->back();
    }

    public function delete_menu($id)
    {
        $delete = Menu::where("id", $id)->first();
        File::delete("public/img_menu".$delete->foto_menu);

        Menu::where("id", $id)->delete();

        return redirect()->back();
    }

    public function edit_menu($id)
    {
        $data["data_menu"] = Menu::where("id", "!=", $id)->get();
        $data["edit"] = Menu::where("id", $id)->first();

        if (!$data["edit"]) {
            return redirect()->back();
        }

        return view("content.menu.update_menu", $data);
    }

    public function update_menu(Request $req)
    {
        $update = Menu::where("id", $req->id)->first();

        $update->kode_menu = $req->kode_menu;
        $update->nama_menu = $req->nama_menu;
        $update->harga_menu = $req->harga_menu;
        $update->status_menu = $req->status_menu;

        if ($req->file("foto_menu") == "")
        {
            $update->foto_menu = $update->foto_menu;
        } else {
            File::delete("public/img_menu/".$update->foto_menu);

            $file = $req->file("foto_menu");
            $fileName = $file->getClientOriginalName();
            $req->file("foto_menu")->move("public/img_menu",$fileName);
            $update->foto_menu = $fileName;
        }

        $update->update();

        return redirect()->back();
    }
}
