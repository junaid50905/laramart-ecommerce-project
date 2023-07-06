@extends('admin.layouts.master')
@section('page_title')
    Warehouse
@endsection

@section('page_headline')
    Warehouse
@endsection

@section('main_content')
    <div class="container">
        @include('admin.layouts.includes.messages')
        <!-- create brand modal button -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createWarehouse">
            Add new warehouse
        </button>

        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Warehouse Name</th>
                            <th>Warehouse Address</th>
                            <th>Warehouse Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouses as $warehouse)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $warehouse->warehouse_name }}</td>
                            <td>{{ $warehouse->warehouse_address }}</td>
                            <td>{{ $warehouse->warehouse_phone }}</td>
                            <td>
                                <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <a href="{{ route('warehouse.destroy', $warehouse->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Create brand modal-->
    <div class="modal fade" id="createWarehouse" tabindex="-1" aria-labelledby="createWarehouseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createWarehouseModalLabel">Add Warehouse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('warehouse.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Warehouse Name</label>
                            <input type="text" name="warehouse_name" class="form-control">
                            @error('warehouse_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Address</label>
                            <input type="text" name="warehouse_address" class="form-control">
                            @error('warehouse_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Warehouse Phone</label>
                            <input type="text" name="warehouse_phone" class="form-control">
                            @error('warehouse_phone')
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


