<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\DeskripsiRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    public function index(){
        return view('index');
    }

    public function payment(DeskripsiRumah $harga, Request $request){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

//         $data = DeskripsiRumah::with('getHarga')->find($harga->id);
// // dd($data);
//         // $data = Auth::user()->owner->projectOwn;

//         $ambil = 0;
//         $ambil_harga_rab = 0;
//         $ambil_harga_desain = 0;
//         foreach ($data as $s) {
//             $ambil_harga_rab += $s->project->harga_rab;
//             $ambil_harga_desain += $s->project->harga_desain;

//             $ambil = $ambil_harga_rab + $ambil_harga_desain;
//         }

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => '121',
            ),
            // 'item_details' => array(
            //     [
            //         'id' => 'a1',
            //         'price' => '1',
            //         'quantity' => 1,
            //         'name' => ''
            //     ],
            //     [
            //         'id' => 'b1',
            //         'price' => '8000',
            //         'quantity' => 1,
            //         'name' => 'Jeruk'
            //     ]
            // ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                // 'last_name' => '',
                // 'name' => Auth::user()->name,
                'email' => Auth::user()->email,

            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('payment/payment', ['snap_token'=>$snapToken]);
    }

    public function payment_post(Request $request){
        $json = json_decode($request->get('json'));
        $order = new Order();
        // $order->status = $json->transaction_status;
        // $order->uname = $request->get('uname');
        // $order->email = $request->get('email');
        // $order->number = $request->get('number');

        // $order->kontrakKonsultanId = $request->kontrakKonsultanId;
        // $order->ownerId = Auth::user()->id;
        // $order->projectId = $request->projectId;
        $order->status = 0;
        $order->status_order = $json->transaction_status;

        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
