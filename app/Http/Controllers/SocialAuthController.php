<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Slide;
use DB,App;
use Session;
use Socialite;


class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    { 	
		$user = Socialite::driver('facebook')->user();
			$a = $user->id;
			$b = $user->name;
			// dd($a);
			$bb = User::where('provider_id',$a)->where('provider','facebook')->get()->first();
			// dd($bb->name);
			if ($bb){
				Auth::login($bb);
				return redirect()->route('index');
				// return 1;
			}
			else {
				$dd              = new User;
				$dd->name        = $user->name;
				$dd->email       = $user->email;
				$dd->phone       = 'null';
				$dd->address     = 'null';
				$dd->provider    ="facebook";
				$dd->provider_id = $a;
				$dd->save();
		        Auth::login($bb);
				return redirect()->route('index');
			}
    }

    public function redirectgg(){
		return Socialite::driver('google')->redirect();
	}
		
	public function callbackgg(){

	    // when google call us a with token
		
		$user = Socialite::driver('google')->user();
		$a = $user->id;
		$b = $user->name;
		// dd($b);
		// dd($a);
		$bb = User::where('provider_id',$a)->where('provider','google')->get()->first();
		// dd($bb);
		if ($bb){
			Auth::login($bb);
			return redirect()->route('index');
		}
		else {
			if(Session::has('locale')){
				App::setLocale(Session::get('locale'));
			}
			$dd              = new User;
			$dd->name        = $user->name;
			$dd->email       = $user->email;
			$dd->phone       = 'null';
			$dd->address     = 'null';
			$dd->provider    ='google';
			$dd->provider_id = $a;
			$dd->save();
	        Auth::login($bb);
			return redirect()->route('index');
		}
	}

}
