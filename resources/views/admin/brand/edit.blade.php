@extends('admin.layouts.master')
@section('page_title')
    Update brand
@endsection

@section('page_headline')
    Edit brand
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <form action="{{ route('brand.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" value="{{ $data->brand_name }}" class="form-control">
                            @error('brand_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>New Brand Image</label>
                            <input type="file" name="brand_img" value="{{ $data->brand_img }}" class="form-control dropify">
                            <p>Previous Image: <img src="{{ asset('storage/files/brand_images/'.$data->brand_img) }}" alt="" height="50" width="80"></p>
                            @error('brand_img')
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
