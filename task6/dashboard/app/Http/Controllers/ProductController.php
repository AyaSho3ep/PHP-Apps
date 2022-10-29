<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Services\Media;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

   public function index()
   {
    $products = Product::all() ;
    return view('products.index',compact('products'));
   }

   public function create()
   {
    $brands =  Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
    $subcategories = DB::table('subcategories')->select('name_en','id')->orderBy('name_en','ASC')->get();
    return view('products.create',compact('brands','subcategories'));
}

   public function edite($id)
   {
    $product = Product::findOrFail($id);
    $brands =  Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
    $subcategories = DB::table('subcategories')->select('name_en','id')->orderBy('name_en','ASC')->get();
    return view('products.edit',compact('brands','subcategories','product'));
}

   public function store(StoreProductRequest $request)
   {

        $newImageName = Media::upload($request->file('image'),'product');
        $data = $request->except('_token','image');
        $data['image'] = $newImageName;
        Product::create($data);
        return redirect()->route('dashboard.products.index')->with('success','Done');
   }

   public function update(UpdateProductRequest $request ,$id )
   {
    $data = $request->except('_token','_method','image');
    $product = Product::findOrFail($id);
    if($request->hasFile('image')){
        $newImageName = Media::upload($request->file('image'),'product');
        $data['image'] = $newImageName;
        Media::delete(public_path('images\product\\'.$product->image));
    }
    $product->update($data);
    return redirect()->route('dashboard.products.index')->with('success','Updated Successfully');

}

public function delete($id)
{
    $product = Product::findOrFail($id);
    Media::delete(public_path('images\product\\'.$product->image));
    return redirect()->route('dashboard.products.index')->with('Deleted Successfully');
}

}
