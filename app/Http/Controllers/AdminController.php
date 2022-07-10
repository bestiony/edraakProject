<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
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
        $this_month = date('m');
        $sales = Order::where('created_at','like','%'.$this_month.'%')->sum('total');
        $users = User::count();
        $orders = Order::count();
        $products = Product::count();
        return view('admin.dashboard',[
            'users'=> $users,
            'orders'=>$orders,
            'products'=>$products,
            'sales'=>$sales
        ]);
    }


    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
