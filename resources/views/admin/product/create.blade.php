@extends('admin.layouts.master')
@section('page_title')
    Add Product
@endsection

@section('page_headline')
    Add-product
@endsection




@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')

        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- ========== left ========== -->
                    <div class="col-md-8">
                        <!-- ========== left-side inputs ========== -->
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Add new product</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Product Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Product Code</label>
                                            <input type="text" name="code" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Category/Subcategory</label>
                                            <select name="subcategory_id" class="form-control">
                                                <option value="">subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Childcategory</label>
                                            <select name="childcategory_id" class="form-control">
                                                <option value="">Childcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Brand</label>
                                            <select name="brand_id" class="form-control">
                                                <option value="">brand</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Pickup Point</label>
                                            <select name="pickup_point_id" class="form-control">
                                                <option value="">pickup_point_id</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Warehouse</label>
                                            <select name="warehouse_id" class="form-control">
                                                <option value="">warehouse_id</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Unit</label>
                                            <input type="text" name="unit" value="{{ old('unit') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Purchase Price</label>
                                            <input type="text" name="purchase_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Selling Price</label>
                                            <input type="text" name="selling_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Discount Price</label>
                                            <input type="text" name="discount_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Stock quantity</label>
                                            <input type="text" name="stock_quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-group-sm">
                                            <label>Video Embed Code</label>
                                            <input type="text" name="video" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Colors</label><br>
                                            <input type="text" name="color" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Size</label><br>
                                            <input type="text" name="size" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group input-group-sm">
                                            <label>Tags</label><br>
                                            <input type="text" name="tags" class="form-control" data-role="tagsinput">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group input-group-sm">
                                            <label>Product Details</label>
                                            <textarea name="description" rows="10" cols="30" class="form-control textarea"></textarea>
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
                                    <input type="file" name="thumbnail" class="form-control dropify">
                                    @error('thumbnail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
