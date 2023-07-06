@extends('admin.layouts.master')
@section('page_title')
    Subcategory
@endsection

@section('page_headline')
    Subcategory
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create category modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createSubcategoryModal">
            Add new subcategory
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Subcategory Name</th>
                            <th>Subcategory Slug</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>{{ $subcategory->subcategory_slug }}</td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm mr-2 editSubCatBtn" value="{{ $subcategory->id }}" data-toggle="modal" data-target="#editSubcategoryModal">Edit</button>
                                <a href="{{ route('subcategory.destroy', $subcategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create category modal-->
    <div class="modal fade" id="createSubcategoryModal" tabindex="-1" aria-labelledby="createSubcategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSubcategoryModalLabel">Add Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" name="subcategory_name" class="form-control">
                            @error('subcategory_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                                <option>Select the category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
    <div class="modal fade" id="editSubcategoryModal" tabindex="-1" aria-labelledby="editSubcategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subcategory.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" name="subcategory_name" id="subcategory_name" class="form-control">
                            @error('subcategory_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
