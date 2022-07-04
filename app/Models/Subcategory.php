<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_has_subcategories');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_has_subcategories');
    }
}
