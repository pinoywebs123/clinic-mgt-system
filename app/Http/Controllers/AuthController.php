<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login_check(Request $request){
    	if(Auth::attempt($request->except('_token'))){
    		return redirect()->route('admin_home');
    	}else{
    		return redirect()->back()->with('err','Invalid Email/Password');
    	}
    }

}
