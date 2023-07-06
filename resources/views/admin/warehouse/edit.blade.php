@extends('admin.layouts.master')
@section('page_title')
    update warehouse information
@endsection

@section('page_headline')
    Update warehouse
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Warehouse Name</label>
                            <input type="text" value="{{ $warehouse->warehouse_name }}" name="warehouse_name" class="form-control">
                            @error('warehouse_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Address</label>
                            <input type="text" value="{{ $warehouse->warehouse_address }}" name="warehouse_address" class="form-control">
                            @error('warehouse_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Phone</label>
                            <input type="text" value="{{ $warehouse->warehouse_phone }}" name="warehouse_phone" class="form-control">
                            @error('warehouse_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('warehouse.index') }}"  class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
