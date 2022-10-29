<?php

namespace App\Http\Controllers\Apis;

use App\Models\Brand;
use App\Models\Product;
use App\Services\Media;
use App\Models\Subcategory;
use App\Http\Traits\ApiResponses;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductsController extends Controller
{
    use ApiResponses;

    public function index()
    {
       $products = Product::all();
       return $this->data(compact('products'));
    }

    public function create()
    {
        $brands =  Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('name_en','id')->orderBy('name_en','ASC')->get();
        return $this->data(compact('brands','subcategories'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands =  Brand::select('id','name_en')->orderBy('name_en','ASC')->get();
        $subcategories = Subcategory::select('name_en','id')->orderBy('name_en','ASC')->get();
        return $this->data(compact('product','brands','subcategories'));
    }

    public function store(StoreProductRequest $request)
    {
        $newImage = Media::upload($request->file('image'),'product');
        $data = $request->except('_token','image');
        $data['image'] = "{{assset('images/products/')}}".$newImage;

        Product::create($data);
        return $this->success('Done');
    }

    public function update(UpdateProductRequest $request , $id)
    {
        $data = $request->except('_token','_method','image');
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            Media::delete(public_path('images\product\\'.$product->image));
        }
        $product->update($data);
        return $this->success('Updated Successfully');

    }

    public function delete($id) 
    {
        $product = Product::findOrFail($id);
        Media::delete(public_path('images\product\\'.$product->image));
            $product->delete();
            return $this->success('Deleted Successfully');
    }

}
