<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ProductHasSubcategory;
use App\Models\CategoryHasSubcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subcategories.index',[
            'categories'=>Category::paginate('12'),
            'subcategories'=> Subcategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subcategory_table = $request->validate([
            'name'=>['required',Rule::unique('subcategories','name')]
        ]);
        $categories = $request->validate([
            'categories'=>'required'
        ]);
        $new_subcategory = Subcategory::create($subcategory_table);
        foreach($categories['categories'] as $category){
            $pair =[
                'subcategory_id' => $new_subcategory->id,
                'category_id'=> $category
            ];
            CategoryHasSubcategory::create($pair);
        }

        return redirect(route('admin.subcategories'))->with('message','subcategory created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        $ids = ProductHasSubcategory::where('subcategory_id',$subcategory->id)->get('product_id');
        $products = Product::whereIn('id',$ids)->get();
        // dd($products);
        // dd(Product::findMany($ids));
        return view('admin.subcategories.show',[
            'subcategory'=>$subcategory,
            'products' => Product::whereIn('id',$ids)->paginate(9)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit',[
            'subcategory'=>$subcategory,
            'categories'=> Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        CategoryHasSubcategory::where('subcategory_id',$subcategory->id)->delete();
        $subcategory_table = $request->validate([
            'name'=>'required'
        ]);
        $categories = $request->validate([
            'categories'=>'required'
        ]);


        $subcategory->update($subcategory_table);

        foreach($categories['categories'] as $category){
            $pair =[
                'subcategory_id' => $subcategory->id,
                'category_id'=> $category
            ];
            CategoryHasSubcategory::create($pair);
        }

        return redirect(route('admin.subcategories'))->with('message','subcategory updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        if(ProductHasSubcategory::where('subcategory_id',$subcategory->id)->count()>0){
            // dd(Product::where('subcategory_id',$subcategory->id)->count()>0);
            return back()->with('error','Unable to delete subcategory,
                                some products still have this category.
                                Unlink them then try again');
        }
        CategoryHasSubcategory::where('subcategory_id',$subcategory->id)->delete();
        Subcategory::find($subcategory->id)->delete();
        return redirect(route('admin.subcategories'))->with('message','subcategory deleted successfully');

    }
}
