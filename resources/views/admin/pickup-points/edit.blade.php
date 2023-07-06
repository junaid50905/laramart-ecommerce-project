@extends('admin.layouts.master')
@section('page_title')
    update pickup point information
@endsection

@section('page_headline')
    Update pickup point
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <form action="{{ route('pickup_point.update', $pickup_point->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pickup Point Name</label>
                            <input type="text" value="{{ $pickup_point->name }}" name="name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Address</label>
                            <input type="text" value="{{ $pickup_point->address }}" name="address" class="form-control">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Phone</label>
                            <input type="text" value="{{ $pickup_point->main_phone }}" name="main_phone" class="form-control">
                            @error('main_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Alternative Phone</label>
                            <input type="text" value="{{ $pickup_point->alternative_phone }}" name="alternative_phone" class="form-control">
                            @error('alternative_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
