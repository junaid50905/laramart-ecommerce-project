@extends('admin.layouts.master')
@section('page_title')
    update coupon information
@endsection

@section('page_headline')
    Update coupon
@endsection

@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <form action="{{ route('offers.coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Coupon Code</label>
                            <input type="text" value="{{ $coupon->coupon_code }}" name="coupon_code" class="form-control">
                            @error('coupon_code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Type</label>
                            <select name="type" class="form-control">
                                <option value="1" {{ $coupon->type === 1 ? 'selected' : '' }}>Fixed</option>
                                <option value="2" {{ $coupon->type === 2 ? 'selected' : '' }}>Percentage</option>
                            </select>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Amount</label>
                            <input type="text" value="{{ $coupon->coupon_amount }}" name="coupon_amount" class="form-control">
                            @error('coupon_amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Valid date</label>
                            <input type="date" value="{{ $coupon->valid_date }}" name="valid_date" class="form-control">
                            @error('valid_date')
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
