<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\order_item;
use App\Models\product_category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
        $data = [

            "products" => product::orderBy("id", "DESC")->get()
        ];
        return view('/admin/produk/produk', $data);
    }

    public function sku(){

        $select =  product::max('sku');
        $sku = $select;

        $noUrut = (int) substr($sku, 3,3);
        $noUrut++;
        $kode = "KB-";
        $hasil = $kode . sprintf("%03s", $noUrut);

        return $hasil;

    }
    public function add(){
        // dd($this->sku());
        $data= [
            "kode" => $this->sku(),
            "kategori" => product_category::orderBy("name", "DESC")->get()
        ];
        return view('/admin/produk/tambah_produk', $data);
    }

    public function edit($id){
        $data = [
            "edit" => product::where("id", decrypt($id))->first(),
            "kategori" => product_category::orderBy("name", "DESC")->get()

        ];

        return view("/admin/produk/edit_produk", $data);
    }
    public function insert(Request $request){

        $message = [
            'sku.required' => 'wajib diisi!!',

            'category_id.required' => 'wajib diisi!!',
            'name.required' => 'wajib diisi!!',
            'description.required' => 'wajib diisi!!',
            'picture_name.required' => 'wajib diisi!!',
            'price.required' => 'wajib diisi!!',
            'stock.required' => 'wajib diisi!!',
            'product_unit.required' => 'wajib diisi!!',

            ];

        $validateData = $this->validate($request, [
            "category_id" => "required",
            'sku' => 'required',
            'name' => 'required',
            'description' => 'required',
            'picture_name' => 'required',
            'product_unit' => 'required',
            'price' => 'required',
            'stock' => 'required',
            ], $message);

        // $validateData = $request->validate([
        //     "category_id" => "required",
        //     'sku' => 'required',
        //     'name' => 'required',
        //     'description' => 'required',
        //     'picture_name' => 'required',
        //     'price' => 'required',
        //     'stock' => 'required',
        // ]);

        if ($request->file("picture_name")) {

            $validateData['picture_name'] = $request->file("picture_name")->store("post-image");

        }


        product::create($validateData);

        return redirect('/produk')->with('pesan','data berhasil di tambahkan');
    }

    public function update(Request $request)
    {



        $validateData = $this->validate($request, [
            "category_id" => "required",
            'sku' => 'required',
            //'picture_name' => 'required',
            'name' => 'required',
            'description' => 'required',
            'product_unit' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        // product::where("id", $request->id)->update([
        //     'category_id' => $request->category_id,
        //     "sku" => $request->sku,
        //     "name" => $request->name,
        //     "description" => $request->description,
        //     "product_unit" => $request->product_unit,
        //     'price'=> $request->price,
        //     'stock'=> $request->stock,
        // ]);
        if ($request->file("picture_name")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['picture_name'] = $request->file("picture_name")->store("image");
        }
        product::where("id", $request->id)->update($validateData);
       // dd($validateData);

        return redirect("/produk");
    }

    public function hapus(Request $request)
    {
        product::where("id", $request->id)->delete();

        return redirect('/produk')->with('pesan','data berhasil di hapus');
    }

    public function detail($id){
        $data = [
            "products" => product::orderBy("id", "DESC")->get(),
            "produk" => product::where("id", decrypt($id))->first(),
            "kategori" => product_category::orderBy("name", "DESC")->get(),
            "order_items" => order_item::orderBy("id", "DESC")->get()
        ];

        return view("/admin/produk/detail", $data);
    }
}
