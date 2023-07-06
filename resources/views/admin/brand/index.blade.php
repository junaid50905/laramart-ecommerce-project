@extends('admin.layouts.master')
@section('page_title')
    Brand
@endsection

@section('page_headline')
    Brand
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create brand modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createBrandModal">
            Add new brand
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Brand Name</th>
                            <th>Brand Slug</th>
                            <th>Brand Log</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>{{ $brand->brand_slug }}</td>
                            <td>
                                <img src="{{ asset('storage/files/brand_images/'.$brand->brand_img) }}" alt="" height="50" width="80">

                            </td>
                            <td>
                                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning btn-sm mr-2" value="">Edit</a>
                                <a href="{{ route('brand.destroy', $brand->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create brand modal-->
    <div class="modal fade" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createBrandModalLabel">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" class="form-control">
                            @error('brand_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Brand Image</label>
                            <input type="file" name="brand_img" class="form-control dropify">
                            @error('brand_img')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit category modal-->
    {{-- <div class="modal fade" id="editChildcategoryModal" tabindex="-1" aria-labelledby="editChildCategoryModaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editChildCategoryModaLabel">Edit Childcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Childcategory Name</label>
                            <input type="text" name="childcategory_name" id="childcategory_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option value="">select the childcategory</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}



@endsection


