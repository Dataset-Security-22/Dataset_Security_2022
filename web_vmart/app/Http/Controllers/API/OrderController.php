<?php

namespace App\Http\Controllers\API;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{


    public function read(){

        $data = order::select('delivery_data')->get();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }

    public function detail(){
        $data = [
            "pesanan" => order::select('delivery_data')->get(),

        ];

        //return view("/admin/anggota/v_detailanggota", $data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
    }

    public function create(Request $request){

        $data = order::create($request->select('delivery_data')->get());
        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function editt($id){
        $data = [

            "edit" => order::where("id", $id)->first(),
            "orders" => order::where("id", "!=" , $id)->get(),
        ];

        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function updates(Request $request){

        customer::where("id", $request->id)->update([
            // "name" => $request->name,
            // "phone_number" => $request->phone_number,
            "delivery_data" => $request->address,


        ]);

        return response()->json(['messege' => 'request success'],200);

    }

    public function hapus($id)
    {
        order::where("id", $id)->delete();

        return response()->json('Program deleted successfully');

    }
    public function index(){

        $data = order::all();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }


    public function insert(Request $request){

        $order = new order;

        $order->order_number = $request->order_number;
        $order->total_price = $request->total_price;
        $order->total_items = $request->total_items;
        $order->delivery_data = $request->delivery_data;
        $order->user_id = $request->user_id;

        // $order->password = bcrypt("walisantri" . $request->no_hp);
        $order->order_status = 1;
        $order->payment_method = 1;
        // $order->id_role = 4;
        // $order->no_hp = $request->no_hp;
        // $order->tanggal_lahir = $request->tanggal_lahir;
        // $order->tempat_lahir = $request->tempat_lahir;
        // $order->jenis_kelamin = $request->jenis_kelamin;
        // $order->no_hp = $request->no_hp;

        $order->save();

        $order_item = new order_item;
        //$product = new product;

        $order_item->order_id = $order->id;
        $order_item->product_id = $request->product_id;
        $order_item->order_qty = $request->order_qty;
        $order_item->order_price = $request->order_price;

        $order_item->save();


        // $data = order::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $order, $order_item],200);

    }

    public function update(Request $request, $id)
    {

        $order = order::find($id);
        $order->update($request->all());


        return response()->json(['messege' => 'request success', 'data' => $order],200);
    }
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();


        return response()->json(['messege' => 'request success', 'data' => null],200);
    }


}
