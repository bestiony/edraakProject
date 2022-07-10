<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CategoryHasSubcategory;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index',[
            'categories'=>Category::paginate('12'),
            'subcategories'=> Subcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.category.create',['subcategories'=> Subcategory::all()]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate fields
        $category_table = $request->validate([
            'name'=>['required',Rule::unique('categories','name')]
        ]);

        $subcategories = $request->validate([
            'subcategories'=>'required'
        ]);
        $check_image = $request->validate([
            'image'=>'required'
        ]);
        //store image
        $file = request()->file('image');
        $filename= $file->getClientOriginalName();

        $file->storeAs('images/',$filename,'s3');
        $s3= Storage::disk('s3')->url('images/'.$filename);
        $image = Image::create([
            'image_url'=> $s3
        ]);

        // collect fields and create category
        $category_table['image_id'] = $image->id;
        $new_category = Category::create($category_table);

        // create category -- subcategory link
        foreach($subcategories['subcategories'] as $subcategory){
            $pair =[
                'category_id' => $new_category->id,
                'subcategory_id'=> $subcategory
            ];
            CategoryHasSubcategory::create($pair);
        }

        return redirect(route('admin.categories'))->with('message','category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',[
            'category'=>$category,
            'subcategories'=> Subcategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request['subcategories']);
        CategoryHasSubcategory::where('category_id',$category->id)->delete();

        $category_table = $request->validate([
            'name'=>'required'
        ]);
        $subcategories = $request->validate([
            'subcategories'=>'required'
        ]);
        //store image
        $file = request()->file('image');
        $filename= $file->getClientOriginalName();

        $file->storeAs('images/',$filename,'s3');
        $s3= Storage::disk('s3')->url('images/'.$filename);
        $image = Image::create([
            'image_url'=> $s3
        ]);

        // collect fields and create category
        $category_table['image_id'] = $image->id;

        $category->update($category_table);
        foreach($subcategories['subcategories'] as $subcategory){
            $pair =[
                'category_id' => $category->id,
                'subcategory_id'=> $subcategory
            ];
            CategoryHasSubcategory::create($pair);
        }

        return redirect(route('admin.categories'))->with('message','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Product::where('category_id',$category->id)->count()>0){
            // dd(Product::where('category_id',$category->id)->count()>0);
            return back()->with('error','Unable to delete category, some products still have this category');
        }
        CategoryHasSubcategory::where('category_id',$category->id)->delete();
        Category::find($category->id)->delete();
        return redirect(route('admin.categories'))->with('message','category deleted successfully');
    }
}
