<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //index
    public function index()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->get();
        return view('admin.warehouse.index', compact('warehouses'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required',
            'warehouse_address' => 'required',
            'warehouse_phone' => 'required',
        ]);
        Warehouse::create($request->all());

        return redirect()->route('warehouse.index')->with('success', 'sucessfully add new warehouse');
    }
    //destroy
    public function destroy($id)
    {
        Warehouse::destroy($id);
        return redirect()->route('warehouse.index')->with('destroy', 'a warehouse has been deleted');
    }
    //edit
    public function edit($id)
    {
        $warehouse = Warehouse::where('id', $id)->first();
        return view('admin.warehouse.edit', compact('warehouse'));
    }
    //update
    public function update(Request $request, $id)
    {
        Warehouse::where('id', $id)->update([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_phone' => $request->warehouse_phone,
            'warehouse_address' => $request->warehouse_address,
        ]);
        return redirect()->route('warehouse.index')->with('success', 'Warehouse informaiton successfully updated');
    }
}
