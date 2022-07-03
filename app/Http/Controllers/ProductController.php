<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ReturnPolicy;
use Illuminate\Http\Request;
use App\Models\OrderHasProduct;
use Illuminate\Validation\Rule;
use App\Models\ProductHasSubcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::latest()->paginate('12')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.products.create',[
            'categories'=> Category::all(),
            'subcategories'=> Subcategory::all(),
            'sizes'=>Product::SIZES,
            'return_policies'=> ReturnPolicy::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_table = $request->validate([
            'name' =>['required',Rule::unique('products','name')],
            'description' =>'required',
            'price' =>'required',
            'size' =>'required',
            'category_id' =>'required',
            'return_policy_id' =>'required',
        ]);

        $other_tables= $request->validate([
            'subcategories' =>'required',
            'image' =>'required',
        ]);


        $image_url = $request->file('image')->store('images','public');
        $image = Image::create([
            'image_url'=> $image_url
        ]);
        $product_table['image_id'] = $image->id;

        $product = Product::create($product_table);

        foreach($other_tables['subcategories'] as $subcategory){
            $pair = [
                'product_id'=> $product->id,
                'subcategory_id'=> intval($subcategory)
            ];
            ProductHasSubcategory::create($pair);
        }
        return redirect(route('admin.show',['product'=>$product]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($product->image->image_url);
        return view('products.show',['product'=>$product]);
    }


    public function adminShow(Product $product){
        return view ('admin.products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'product' => $product,
            'categories'=> Category::all(),
            'subcategories'=> Subcategory::all(),
            'sizes'=>Product::SIZES,
            'return_policies'=> ReturnPolicy::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //delete previous subcategories relationships first then update
        ProductHasSubcategory::where('product_id',$product->id)->delete();

        $product_table = $request->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'size' =>'required',
            'category_id' =>'required',
            'return_policy_id' =>'required',
        ]);

        $other_tables= $request->validate([
            'subcategories' =>'required',
            'image' =>'required',
        ]);


        $image_url = $request->file('image')->store('images','public');
        $image = $product->image;
        $image->update([
            'image_url'=> $image_url
        ]);
        $product_table['image_id'] = $image->id;

        $product->update($product_table);



        foreach($other_tables['subcategories'] as $subcategory){
            $pair = [
                'product_id'=> $product->id,
                'subcategory_id'=> intval($subcategory)
            ];
            ProductHasSubcategory::create($pair);
        }
        return redirect(route('admin.show',['product'=>$product]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(OrderHasProduct::where('product_id',$product->id)->count()==0){
            $product->forceDelete();
        }
        else {
            $product->delete();
        }
        return redirect(route('admin.products'))->with('message','product deleted successfuly!');
    }

    public function adminIndex(){
        return view('admin.products.index',['products'=>Product::latest()->paginate('12')]);
    }
}
