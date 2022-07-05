<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ReturnPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'size',
        'price',
        'image_id',
        'return_policy_id',
        'category_id',
    ];
    const SIZES = [
                1=>'s',
                2=>'m',
                3=>'l',
                4=>'xl',
                5=>'xxl'];

    public function image(){
        return $this->belongsTo(Image::class,'image_id');
    }

    public function returnPolicy(){
        return $this->belongsTo(ReturnPolicy::class, 'return_policy_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getSubcategories($id){
        return \App\Models\ProductHasSubcategory::
            where('product_id',$id)->get()
        ;
    }
    public function subcategories(){

        return $this->belongsToMany(Subcategory::class, 'product_has_subcategories');
    }


    public function scopeFilter($query){
        if (request('search')){
            $query->where('name', 'like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%');
        }
        if (request('category')){
            $query->where('category_id','like','%'.request('category').'%');
        }
    }
}
