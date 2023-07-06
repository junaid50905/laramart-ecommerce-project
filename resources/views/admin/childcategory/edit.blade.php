@extends('admin.layouts.master')
@section('page_title')
    Update childcategory
@endsection

@section('page_headline')
    Edit Childcategory
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="modal-body">
                        <form action="{{ route('childcategory.update', $edit_childcategory_data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Childcategory Name</label>
                                <input type="text" name="childcategory_name"
                                    value="{{ $edit_childcategory_data->childcategory_name }}" class="form-control">
                                @error('childcategory_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="subcategory_id" class="form-control">
                                    <option selected value="{{ $edit_childcategory_data->id }}">Your recent subcategory is: -----{{ $edit_childcategory_data->subcategory->subcategory_name }}</></option>
                                    @foreach ($categories as $category)
                                        <option disabled class="text-info">{{ $category->name }}</option>
                                        @php
                                            $subcategories= DB::table('subcategories')->where('category_id',$category->id)->get();
                                        @endphp
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">----{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
