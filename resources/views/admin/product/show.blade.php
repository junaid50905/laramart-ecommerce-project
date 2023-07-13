@extends('admin.layouts.master')
@section('page_title')
    Manage product
@endsection

@section('page_headline')
    Manage-product
@endsection



@section('main_content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- images --}}
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                @foreach ($product->tempImages as $multiimage)
                                    <div style="border: 1px solid; padding: 5px 20px;">
                                        <img src="{{ asset('assets/images/product-images/multiple-images/' . $multiimage->image) }}"
                                            alt="" height="100" width="100">
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                <div class="thumbnail-image">
                                    <img src="{{ asset('assets/images/product-images/thumbnail/' . $product->thumbnail) }}"
                                        alt="" height="300" width="280">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- content --}}
                    <div class="col-md-6">
                        <h3>{{ $product->name }}</h3>
                        <p><b>Category:</b>{{ $product->category->name }}</p>
                        <p><b>Subcategory:</b>{{ $product->subcategory->subcategory_name }}</p>
                        <p><b>Childcategory:</b>{{ $product->childcategory->childcategory_name }}</p>
                        <p><b>Purchase price:</b> {{ $product->purchase_price }}৳</p>
                        <p><b>Selling price:</b> {{ $product->selling_price }}৳</p>
                        <p><b>Discount price:</b> {{ $product->discount_price }}৳</p>
                        <p><b>Stock quantity: </b> {{ $product->stock_quantity }}</p>
                        <p><b>Available color:</b> {{ $product->color ?? 'color will be like the product thumbnail' }}</p>
                        <p><b>Available size:</b> {{ $product->size ?? 'this product did not contain size' }}</p>
                        <p><b>See the product video:</b> <a href="{{ $product->video }}">click here</a>
                        <p>
                        <p><b>Unit:</b> {{ $product->unit }}
                        <p>
                        <p><b>Tags:</b> {{ $product->tags }}
                        <p>
                            <span><input type="checkbox" {{ $product->featured == 1 ? 'checked' : '' }}>Featured |</span>
                            <span><input type="checkbox" {{ $product->status == 1 ? 'checked' : '' }}>Status |</span>
                            <span><input type="checkbox" {{ $product->today_deal == 1 ? 'checked' : '' }}>Today Deal
                                |</span>
                            <span><input type="checkbox" {{ $product->cash_on_delivery == 1 ? 'checked' : '' }}>Cash on
                                delivery</span>
                    </div>
                </div>
                <div>Product Detailes: {!! $product->description !!}</div>
            </div>
        </div>
    </div>
@endsection
