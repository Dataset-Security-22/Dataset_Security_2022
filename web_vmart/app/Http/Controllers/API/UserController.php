<?php

namespace App\Http\Controllers\API;
use App\Models\user;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class USerController extends Controller
{

    public function index(){

        $data = user::all();


        return response()->json(['messege' => 'request success', 'data'=>$data],200);
    }

    public function detail(){
        $data = [
            "anggota" => User::all(),

        ];

        //return view("/admin/anggota/v_detailanggota", $data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
    }


    // public function insert(Request $request){




    //     User::create([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "username" => $request->username,
    //         "password" => bcrypt($request->password)
    //     ]);

    //     //return redirect()->route('profile')->with('pesan','data berhasil di tambahkan');
    //     return response()->json(['messege' => 'request success'],200);
    // }
    // public function insert(Request $request){




    //     $data = user::create($request->all());
    //     return response()->json(['messege' => 'request success', 'data' => $data],200);

    // }

    public function edit($id){
        $data = [

            "edit" => User::where("id", $id)->first(),
            "users" => User::where("id", "!=" , $id)->get(),
            //"kategori" => KategoriModel::orderBy("nama_kategori", "DESC")->get()
        ];


       // return view('/admin/setting/profile', $data);
        return response()->json(['messege' => 'request success', 'data' => $data],200);
        // return response()->json(['messege' => 'request success', 'data' => $data],200);
        // return view("/admin/petugas/v_editpetugas", $data);
    }

    public function update(Request $request){




        User::where("id", $request->id)->update([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password),

        ]);


        //return redirect()->back()->with('pesan','data berhasil di tambahkan');
        return response()->json(['messege' => 'request success'],200);

    }
    public function destroy($id)
    {
        User::where("id", $id)->delete();

        return response()->json('Program deleted successfully');
        //  return redirect("/kategori");
    }

    public function insert(Request $request){

        $user = new user;

       // $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        $user->role = 'customer';
        //$user->user_id = $request->user_id;

        // $order->password = bcrypt("walisantri" . $request->no_hp);
        // $order->order_status = 1;
        // $order->payment_method = 1;


        $user->save();

        $customer = new customer;
        //$product = new product;

        $customer->user_id = $user->id;
        $customer->name = $user->username;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;

        $customer->save();


        // $data = order::create($request->all());
        return response()->json(['messege' => 'request success', 'data' => $user, $customer],200);

    }

}
