<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Otentikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('email')){
            return redirect('/');
        }

        $user = User::where('email', Session::get('email'))->first();
        
        if ($user->nim == '') {
            return redirect('profile');
        }

        return $next($request);
    }
}
