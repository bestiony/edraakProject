<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['name','image_id'];



    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function subcategories(){
        return $this->belongsToMany(Subcategory::class,'category_has_subcategories');
    }

    public function image(){
        return $this->belongsTo(Image::class,'image_id');
    }
}
