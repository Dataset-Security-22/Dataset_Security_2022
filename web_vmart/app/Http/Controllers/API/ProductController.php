<?php

namespace App\Http\Controllers\API;
use App\Models\product;
use App\Models\product_category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){

        $data = product::all();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }

    public function insert(Request $request){




        $data = product::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function update(Request $request, $id)
    {

        $product = product::find($id);
        $product->update($request->all());


        return response()->json(['messege' => 'request success', 'data' => $product],200);
    }
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();


        return response()->json(['messege' => 'request success', 'data' => null],200);
    }
}
