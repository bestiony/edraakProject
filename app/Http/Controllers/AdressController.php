<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdressController extends Controller
{
    public function create(){
        $cart = session()->get('cart');
        if (!$cart){
            return redirect()->route('products')->with('error','nothing to checkout, cart empty');
        }

        return view('user.addresses.create',[
            'addresses'=>auth()->user()->addresses,
            'bg_colour' => ' bg-gray-100 '
        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'address_line_1'=>['string','required'],
            'address_line_2'=>'string',
            'city'=>['string','required'],
            'state'=>'string',
            'country'=>['string','required',Rule::in(Address::COUNTRIES)],
            'postal_code'=>['string','required']
        ]);
        // dd(auth()->id());
        $formFields['user_id'] = auth()->id();
        $newAdress = Address::create($formFields);
        return $newAdress;
    }
}
