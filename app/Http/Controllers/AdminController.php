<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function loginPage(){
        // if (Auth::guard('admin')->check()) {
        //     return redirect(route('admin.dashboard'));
        // }
        return view('admin.login');
    }





    public function authenticate(Request $request){
        $fields = $request->validate([
            'email'=>['required', 'email'],
            'password' => ['required','min:6']
        ]);
        if(Auth::guard('admin')->attempt($fields)){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('message','Welcome back Boss!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials!>-('])->onlyInput('email');
    }



    public function dashboard(){
        return view('admin.dashboard');
    }


    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
