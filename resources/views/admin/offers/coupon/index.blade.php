@extends('admin.layouts.master')
@section('page_title')
    Coupon
@endsection

@section('page_headline')
    Coupon
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create brand modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCoupon">
            Add new coupon
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Coupon Code</th>
                            <th>Coupon Amount</th>
                            <th>Coupon Type</th>
                            <th>Coupon Date</th>
                            <th>Coupon Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $coupon->coupon_code }}</td>
                            <td>{{ $coupon->coupon_amount }}</td>
                            <td>{{ $coupon->type == 1 ? 'Fixed' : 'Percentage' }}</td>
                            <td>{{ $coupon->valid_date }}</td>
                            <td>{{ $coupon->status }}</td>
                            <td>
                                <a href="{{ route('offers.coupon.edit', $coupon->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <a href="{{ route('offers.coupon.destroy', $coupon->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create brand modal-->
    <div class="modal fade" id="createCoupon" tabindex="-1"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('offers.coupon.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Coupon Code</label>
                            <input type="text" name="coupon_code" class="form-control">
                            @error('coupon_code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Type</label>
                            <select name="type" class="form-control">
                                <option value="1">Fixed</option>
                                <option value="2">Percentage</option>
                            </select>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Coupon Amount</label>
                            <input type="text" name="coupon_amount" class="form-control">
                            @error('coupon_amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Valid date</label>
                            <input type="date" name="valid_date" class="form-control">
                            @error('valid_date')
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


