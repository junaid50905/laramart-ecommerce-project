@extends('admin.layouts.master')
@section('page_title')
    Childcategory
@endsection

@section('page_headline')
    Childcategory
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create category modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createChildCategoryModal">
            Add new childcategory
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Childcategory Name</th>
                            <th>Childcategory Slug</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($childcategories as $childcategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $childcategory->childcategory_name }}</td>
                            <td>{{ $childcategory->childcategory_slug }}</td>
                            <td>{{ $childcategory->category->name }}</td>
                            <td>{{ $childcategory->subcategory->subcategory_name}}</td>
                            <td>
                                <a href="{{ route('childcategory.edit', $childcategory->id) }}" class="btn btn-warning btn-sm mr-2" value="{{ $childcategory->id }}">Edit</a>
                                <a href="{{ route('childcategory.destroy', $childcategory->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create childcategory modal-->
    <div class="modal fade" id="createChildCategoryModal" tabindex="-1" aria-labelledby="createChildCategoryModaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createChildCategoryModaLabel">Add Childcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('childcategory.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Childcategory Name</label>
                            <input type="text" name="childcategory_name" class="form-control">
                            @error('childcategory_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="subcategory_id" id="" class="form-control">
                                <option selected>Select the subcategory</option>
                                @foreach ($categories as $category)
                                <option disabled class="text-info">{{ $category->name }}</option>
                                    @php
                                        $category_wise_subcategory = DB::table('subcategories')->where('category_id', $category->id)->get();
                                    @endphp
                                    @foreach ($category_wise_subcategory as $subcategory)
                                    <option value="{{ $subcategory->id }}">-----{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('subcategory_id')
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


