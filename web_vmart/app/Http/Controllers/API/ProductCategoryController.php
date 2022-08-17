<?php

namespace App\Http\Controllers\API;
use App\Models\product_category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductCategoryController extends Controller
{
    public function index(){

        $data = product_category::all();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }
    // public function index(){
    //     $data = [

    //         "product_category" => product_category::orderBy("id", "DESC")->get()
    //     ];
    //     // return view('/admin/kategori/kategori', $data);
    //     return response()->json(['messege' => 'request success', 'data' => $data],200);
    // }

    public function insert(Request $request){




        $data = product_category::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function edit($id){
        $data = [
            "edit" => product_category::where("id", $id)->first(),
            "product_category" => product_category::where("id", "!=" , $id)->get()

        ];

        // return view("/admin/kategori/edit_kategori", $data);
        return response()->json(['messege' => 'request success', 'data' => $data['edit']],200);
    }

    public function update(Request $request, $id)
    {

        $product_category = product_category::find($id);
        $product_category->update($request->all());


        return response()->json(['messege' => 'request success', 'data' => $product_category],200);
    }

    public function destroy($id)
    {
        $product_category = product_category::find($id);
        $product_category->delete();


        return response()->json(['messege' => 'request success', 'data' => null],200);
    }

    // public function insert(Request $request){

    //     $message = [
    //         "required" => "Kolom :attribute wajib diisi",
    //         'min' => "kolom :attribute minimal harus :min karakter",
    //         'max' => "kolom :attribute maximal harus :max karakter"

    //     ];

    //     $this->validate($request, [
    //         "name" => "required|min:4"
    //     ], $message);

    //     $cek_double = product_category::where(["name" => $request->name])->count();

    //     if ($cek_double > 0) {
    //         return redirect()->back()->with("gagal", "Tidak Boleh Duplikasi Data");
    //     }

    //     product_category::create($request->all());

    //     return redirect()->route('kategori')->with('sukses','data berhasil di tambahkan');
    // }

//     public function update(Request $request)
//     {
//         product_category::where("id", $request->id)->update([
//             "name" => $request->name
//         ]);

//        // return response()->json(['messege' => 'request success'],200);
//         return redirect("/kategori");
//     }

//     public function hapus(Request $request)
//     {
//         product_category::where("id", $request->id)->delete();

//         //return response()->json('Program deleted successfully');
//          return redirect("/kategori");
//     }
}
