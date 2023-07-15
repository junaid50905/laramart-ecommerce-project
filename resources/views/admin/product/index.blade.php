@extends('admin.layouts.master')
@section('page_title')
    Manage product
@endsection

@section('page_headline')
    Manage-product
@endsection



@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <a href={{ route('add_product.create') }} class="btn btn-primary btn-sm mb-4">Add new product</a>
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Purching Price</th>
                            <th>Selling Price Phone</th>
                            <th>Discount Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset('assets/images/product-images/thumbnail/'.$product->thumbnail) }}" alt="" height="50" width="50"
                                    class="ml-4"></td>
                            <td>{{ $product->purchase_price }}৳</td>
                            <td>{{ $product->selling_price }}৳</td>
                            <td>{{ $product->discount_price }}৳</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                <a href="{{ route('add_product.show', $product->id) }}" class="btn btn-sm btn-primary">Show</a>
                                <a href={{ route('add_product.edit', $product->id) }} class="btn btn-sm btn-warning mx-2">Edit</button>
                                <a href="{{ route('add_product.destroy', $product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
