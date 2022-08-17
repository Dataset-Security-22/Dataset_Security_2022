<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function sign_in(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();

        $token = bin2hex(random_bytes(40));

        $user->update([
            "token" => $token,
        ]);

        return response()->json($user);
    }
}
