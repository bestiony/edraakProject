<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    static public $ORDER_STATUSES = [
        1 => 'Processing',
        2 => 'Shipped',
        3 => 'Delivered',
        4 => 'Complete',
        5 => 'Canceled',
    ];
    static public $ORDER_STATUS_COLOR = [
        1 => ' text-blue-600 ',
        2 => ' text-yellow-600 ',
        3 => ' text-orange-600 ',
        4 => ' text-green-600 ',
        5 => ' text-red-600 ',
    ];

    protected $fillable = ['user_id','address_id','status','total'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_has_products')->withPivot(['quantity','price_when_ordered']);
    }

    public function get_product_quantity($Productid){
        $quantity = OrderHasProduct::select('quantity')->where('order_id',$this->id)->where('product_id',$Productid)->get()->toArray()[0]['quantity'];
        return $quantity;
        // return $this->products->where('id',$Productid)->first()->pivot->quantity;
    }

    public function get_product_price_when_ordered($Productid){
        $price = OrderHasProduct::select('price_when_ordered')->where('order_id',$this->id)->where('product_id',$Productid)->get()->toArray()[0]['price_when_ordered'];
        return $price;
        // return $this->products->where('id',$Productid)->first()->pivot->price_when_ordered;
    }

    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }


}
