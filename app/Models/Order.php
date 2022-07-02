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

    protected $fillable = ['user_id','address_id','status','total'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_has_products')->withPivot('quantity');
    }

    public function get_product_quantity($Productid){
        return $this->products->where('id',$Productid)->first()->pivot->quantity;
    }

    public function address(){
        return $this->hasOne(Address::class,'id');
    }


}
