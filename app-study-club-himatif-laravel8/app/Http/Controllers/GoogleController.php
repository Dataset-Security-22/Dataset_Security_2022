<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Hash;
use Socialite;
use App\Models\User;

class GoogleController extends Controller
{
	public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
    	try {

    		$user = Socialite::driver('google')->stateless()->user();

            /// lakukan pengecekan apakah google id nya sudah ada apa belum
    		$isUser = User::where('google_id', $user->id)->first();

            /// jika sudah ada, langsung login
    		if($isUser){

    			Auth::login($isUser);
    			return redirect('/dashboard');

            } else { /// jika belum ada, register baru

            	$createUser = new User;
            	$createUser->name =  $user->getName();

                /// mendapatkan email dari google
            	if($user->getEmail() != null){
            		$createUser->email = $user->getEmail();
            		$createUser->email_verified_at = \Carbon\Carbon::now();
            	}  

                /// tambahkan google id
            	$createUser->google_id = $user->getId();

                /// membuat random password
            	$rand = rand(111111,999999);
            	$createUser->password = Hash::make($user->getName().$rand);

                /// save
            	$createUser->save();

                /// login
            	Auth::login($createUser);
            	return redirect('/home');
            }

        } catch (Exception $exception) {
        	dd($exception->getMessage());
        }
    }
}
