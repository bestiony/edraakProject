<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ReturnPolicy;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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


    public function scopeFilter($query, $filters){

        $search = $filters['search'] ?? false;
        $category = $filters['category']?? false;
        $subcategory = $filters['subcategory']?? false;
        $size = $filters['size']?? false;
        $min = $filters['min']?? false;
        $max = $filters['max']?? false;


        $query->
        when($search,function($query, $search){
            return $query->where('name', 'like','%'.$search.'%')
            ->orWhere('description','like','%'.request('search').'%');
        })->
        when($category,function($query, $category){
            return $query->where('category_id','like','%'.$category.'%');
        })->
        when($subcategory,function($query, $subcategory){
            $search = $subcategory;
            $pivot = $this->subcategories()->getTable();
            return$query->whereHas('subcategories', function($q) use($search , $pivot){
                $q->where("{$pivot}.subcategory_id", $search);
            });
        })->
        when($size,function($query, $size){
            return $query->where('size',$size);
        })->
        when(($min && $max),function($query, $min,$max){
            $range = [$min,$max];
            return  $query->whereBetween('price',$range);
        })
        ;


    
    }
}
