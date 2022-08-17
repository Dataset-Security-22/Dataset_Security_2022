<?php

namespace App\Http\Controllers\API;
use App\Models\payment;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    public function index(){

        $data = payment::all();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }

    public function insert(Request $request){




        $data = payment::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $data],200);

    }

    public function update(Request $request, $id)
    {

        $payment = payment::find($id);
        $payment->update($request->all());


        return response()->json(['messege' => 'request success', 'data' => $payment],200);
    }
    public function destroy($id)
    {
        $payment = payment::find($id);
        $payment->delete();


        return response()->json(['messege' => 'request success', 'data' => null],200);
    }


}
