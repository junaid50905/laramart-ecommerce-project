@extends('admin.layouts.master')
@section('page_title')
    Pickup Points information
@endsection

@section('page_headline')
    Pickup Points
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create brand modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createPickupPoint">
            Add new pickup point
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Pickup Point Name</th>
                            <th>Pickup Point Address</th>
                            <th>Pickup Point Phone</th>
                            <th>Pickup Point Alternative Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pickup_points as $pickup_point)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pickup_point->name }}</td>
                            <td>{{ $pickup_point->address }}</td>
                            <td>{{ $pickup_point->main_phone }}</td>
                            <td>{{ $pickup_point->alternative_phone }}</td>
                            <td>
                                <a href="{{ route('pickup_point.edit', $pickup_point->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <a href="{{ route('pickup_point.destroy', $pickup_point->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create brand modal-->
    <div class="modal fade" id="createPickupPoint" tabindex="-1"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Pickup Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pickup_point.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Pickup Point Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Address</label>
                            <input type="text" name="address" class="form-control">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Phone</label>
                            <input type="text" name="main_phone" class="form-control">
                            @error('main_phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Pickup Point Alternative Phone</label>
                            <input type="text" name="alternative_phone" class="form-control">
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


