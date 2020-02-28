<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PoskoLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:posko');
	}

    public function showLoginForm()
    {
    	return view('auth.posko-login');
    }

    public function login(Request $request)
    {
    	 $this->validate($request, [
    	 	'email' => 'required|email',
    	 	'password' => 'required|min:6'
    	 	]);

    	 if ( Auth::guard('posko')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember) ){
    	 	return redirect()->intended(route('posko.dashboard'));
    	 }

    	return redirect()-> back()-> withInput($request->only('email','remember'));
    }
}
