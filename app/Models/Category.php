<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function subcategories(){
        return $this->belongsToMany(Subcategory::class,'category_has_subcategories');
    }
}
