<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdressController extends Controller
{
    public function create(Request $request){
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
        return $newAdress->id;
    }
}
