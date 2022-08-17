<?php

namespace App\Http\Controllers\API;
use App\Models\order_item;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderItemController extends Controller
{
    public function index(){

        $order_item = order_item::all();
        $data = [];
        foreach ($order_item as $item) {
            $data[] = [
                "id" => $item->id,

                "nama" => $item->getOrder->getCustomer->name,
                "produk" => $item->getProduk->name,
                "qty" => $item->order_qty,
                "order_price" => $item->order_price,
            ];
        }

        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }

    public function insert(Request $request){




        $data = order_item::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function update(Request $request, $id)
    {

        $order_item = order_item::find($id);
        $order_item->update($request->all());


        return response()->json(['messege' => 'request success', 'data' => $order_item],200);
    }
    public function destroy($id)
    {
        $order_item = order_item::find($id);
        $order_item->delete();


        return response()->json(['messege' => 'request success', 'data' => null],200);
    }

}
