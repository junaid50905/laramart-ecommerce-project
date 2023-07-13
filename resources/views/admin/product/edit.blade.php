@extends('admin.layouts.master')
@section('page_title')
    Update product
@endsection

@section('page_headline')
    Update-product
@endsection


@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')

        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <!-- ========== left ========== -->
                    <div class="col-md-8">
                        <!-- ========== left-side inputs ========== -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Product Name</label>
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Product Code</label>
                                            <input type="text" name="code" value="{{ $product->code }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Category</label>
                                            <select name="category_id" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if ($category->name === $product->category->name)
                                                    {{ "selected" }}
                                                @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Subcategory</label>
                                            <select name="subcategory_id" id="subcategory" class="form-control">
                                                <option selected>{{ $product->subcategory->subcategory_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Childcategory</label>
                                            <select name="childcategory_id" id="childcategory" class="form-control">
                                                <option selected>{{ $product->childcategory->childcategory_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Brand</label>
                                            <select name="brand_id" class="form-control">
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" @if ($brand->brand_name === $product->brand->brand_name) {{ "selected" }} @endif>{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Pickup Point</label>
                                            <select name="pickup_point_id" class="form-control">
                                                @foreach ($pick_up_points as $pick_up_point)
                                                <option value="{{ $pick_up_point->id }}" @if ($pick_up_point->name === $product->pickupPoint->name) {{ "selected" }} @endif>{{ $pick_up_point->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Warehouse</label>
                                            <select name="warehouse_id" class="form-control">
                                                @foreach ($warehouses as $warehouse)
                                                    <option value="{{ $warehouse->id }}" @if ($warehouse->warehouse_name === $product->warehouse->warehouse_name) {{ "selected" }} @endif>{{ $warehouse->warehouse_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Unit</label>
                                            <input type="text" name="unit" value="{{ $product->unit }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Purchase Price</label>
                                            <input type="text" name="purchase_price"
                                                value="{{ $product->purchase_price }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Selling Price</label>
                                            <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Discount Price</label>
                                            <input type="text" name="discount_price"
                                                value="{{ $product->discount_price }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Stock quantity</label>
                                            <input type="text" name="stock_quantity"
                                                value="{{ $product->stock_quantity }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Video Embed Code</label>
                                            <input type="text" name="video" value="{{ $product->video }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Colors</label><br>
                                            <input type="text" name="color" value="{{ $product->color }}"
                                                class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Size</label><br>
                                            <input type="text" name="size" value="{{ $product->size }}"
                                                class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Tags</label><br>
                                            <input type="text" name="tags" value="{{ $product->tags }}"
                                                class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group input-group-sm">
                                            <label>Product Details</label>
                                            <textarea name="description" rows="10" cols="30" class="form-control textarea">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========== right ========== -->
                    <div class="col-md-4">
                        <!-- ========== right-side inputs ========== -->
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Thumbnail Image</label>
                                    <input type="file" name="thumbnail" class="form-control">
                                    <div class="mt-3">
                                        <img src="{{ asset('assets/images/product-images/thumbnail/' . $product->thumbnail) }}"
                                            alt="" height="90" width="90">
                                    </div>
                                    @error('thumbnail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Temporary Images</label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    <div>
                                        @forelse ($product->tempImages as $multiimage)
                                            <img src="{{ asset('assets/images/product-images/multiple-images/' . $multiimage->image) }}"
                                                alt="" height="60" width="60" class="m-2"><a
                                                href="{{ route('destroyThumbnail', $multiimage->id) }}">X</a>
                                        @empty
                                            <p>this item has no temporary image</p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="featured" name="featured"
                                        {{ $product->featured == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="featured">Featured Product</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="todaydeal" name="today_deal"
                                        {{ $product->today_deal == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="todaydeal">Today Deal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                        {{ $product->status == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="cash_on_delivery"
                                        name="cash_on_delivery" {{ $product->cash_on_delivery == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="cash_on_delivery">Cash on Delivery</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100">Save</button>
            </form>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('ui/admin') }}/plugins/jquery/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                //subcategory
                $('#category').change(function() {
                    var id_category = $(this).val()
                    if (id_category) {
                        $.ajax({
                            url: "product/update/fetch-subcategory/" + id_category,
                            type: "GET",
                            dataType: "json",
                            success: function(response) {
                                $('#subcategory').html('<option>Select the subcategory</option>')
                                $.each(response, function(index, val) {
                                    $('#subcategory').append('<option value="' + val.id +
                                        '">' +
                                        val.subcategory_name + '</option>');
                                });
                            }
                        })
                    } else {
                        alert('denger');
                    }
                })
                //childcategory
                $('#subcategory').change(function() {
                    var id_subcategory = $(this).val()
                    if (id_subcategory) {
                        $.ajax({
                            url: "product/update/fetch-childcategory/" + id_subcategory,
                            type: "GET",
                            dataType: "json",
                            success: function(response) {
                                $('#childcategory').html(
                                    '<option>Select the cahildcategory</option>')
                                $.each(response, function(index, val) {
                                    $('#childcategory').append('<option value="' + val.id +
                                        '">' +
                                        val.childcategory_name + '</option>');
                                });
                            }
                        })
                    } else {
                        alert('denger');
                    }
                })
            })
        </script>
    @endsection
