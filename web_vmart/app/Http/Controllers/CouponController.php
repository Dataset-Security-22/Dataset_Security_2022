<?php

namespace App\Http\Controllers;
use App\Models\coupon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CouponController extends Controller
{
    public function index(){
        $data = [

            "coupon" => coupon::orderBy("id", "DESC")->get()
        ];
        return view('/admin/kupon/kupon', $data);
    }

    public function edit($id){
        $data = [
            "edit" => coupon::where("id", $id)->first(),
            "coupon" => coupon::where("id", "!=" , $id)->get()

        ];

        return view("/admin/kupon/edit_kupon", $data);
    }

    public function insert(Request $request){

        $message = [
            "required" => "Kolom :attribute wajib diisi",
            'min' => "kolom :attribute minimal harus :min karakter",
            'max' => "kolom :attribute maximal harus :max karakter"

        ];

        $this->validate($request, [
            "name" => "required|min:4"
        ], $message);

        $cek_double = coupon::where(["name" => $request->name])->count();

        if ($cek_double > 0) {
            return redirect()->back()->with("gagal", "Tidak Boleh Duplikasi Data");
        }

        coupon::create($request->all());

        return redirect()->route('kupon')->with('sukses','data berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        coupon::where("id", $request->id)->update([
            "name" => $request->name
        ]);

       // return response()->json(['messege' => 'request success'],200);
        return redirect("/kupon");
    }

    public function hapus(Request $request)
    {
        coupon::where("id", $request->id)->delete();

        //return response()->json('Program deleted successfully');
         return redirect("/kupon");
    }
}
