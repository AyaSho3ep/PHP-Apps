@extends('layouts.parent')
@yield('title', 'create')
@section('content')
    <div class="col-12">
        <form action="{{ route('dashboard.products.update',$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-row my-2">
                <div class="col-6">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $product->name_en }}">
                </div>
                <div class="col-6">
                    <label for="name_ar">Name (AR)</label>
                    <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{$product->name_ar}}">
                </div>
                <div class="col-6">
                    <label for="price">price (LE)</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="col-6">
                    <label for="quantity">quantity </label>
                    <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
                </div>
                <div class="col-6">
                    <label for="status">status </label>
                    <select name="status" id="status" class="form-control">
                        <option @selected($product->status ==1) value="1">Active</option>
                        <option @selected($product->status == 0) value="0">Not Active</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="brand_id" >brand </label>
                    <select name="brand_id" id="brand_id"class="form-control">
                    @foreach ($brands as $brand)
                    <option @selected(old('brand_id') == $brand->id)  value=" {{ $brand->id }}">{{ $brand->name_en }}</option>
                    </select>
                     @endforeach

                </div>


                <div class="col-6">
                    <label for="subcategory">subcategory </label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                    @foreach ($subcategories as $subcategory)
                    <option @selected(old('subcategory_id')==$subcategory->id) value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</select>
                    @endforeach
                </div>
                <div class="form-row my-2">
                    <div class="col-6">
                        <label for="details_en">Details (EN)</label>
                        <textarea name="details_en" id="details_en" class="form-control" cols="30" rows="10">{{ $product->details_en}}</textarea>

                    </div>
                    <div class="col-6">
                        <label for="details_ar">Details (AR)</label>
                        <textarea name="details_ar" id="details_ar" class="form-control" cols="30" rows="10">{{$product->details_ar)}}</textarea>

                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col-4">
                        <label for="image">Image</label>
                        <img src="{{asset('images/product/'.$product->image)}}" alt="" class="w-100">
                        <input type="file" name="image" class="form-control" id="image">

                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col-2">
                        <button class="btn btn-primary"> edite </button>
                    </div>


            </div>

        </form>
    </div>
@endsection
