<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use \App\Models\User;
use \App\Models\Classes;
use \App\Models\Category;

class LecturerController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('category', 'asc')->get();
        return view('lecturer.index', compact('category'));
    }

    public function get()
    {
        $user = User::where('id_role', 2)->get();

        $data = array();

        foreach ($user as $u) {
            $data[] = array(
                'id' => $u->id,
                'name' => $u->name,
                'email' => $u->email,
                'whatsapp' => '<a href="//wa.me/'.$u->whatsapp.'" target="_blank">'.$u->whatsapp.'</a>',
                'class' => $u->classes
            );
        }
        return response()->json($data);
    }

    public function add(Request $request)
    {
        $user = User::where('nim', $request->nim)->update([
            'id_role' => 2
        ]);

        if ($user) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'id_role' => 2,
            'id_class' => 1,
            'id_category' => $request->category
        ]);

        if ($user) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function user(Request $request)
    {
        $user = User::select('name', 'nim')->where('name', 'like', '%'.$request->term.'%')->where('id_role', 3)->get();

        $data = array();

        foreach ($user as $u) {
            $data[] = $u->nim . ' - ' . $u->name;
        }

        return response()->json($data);
    }

    public function del(Request $request)
    {
        $user = User::where('id', $request->user)->update([
            'id_role' => 3
        ]);

        if ($user) {
            echo 1;
        } else {
            echo 2;
        }
    }
}
