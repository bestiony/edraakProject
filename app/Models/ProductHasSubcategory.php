<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasSubcategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_has_subcategories';
    protected $fillable =['product_id','subcategory_id'];
}
