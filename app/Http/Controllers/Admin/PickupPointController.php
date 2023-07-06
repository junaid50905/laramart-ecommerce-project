<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    //index
    public function index()
    {
        $pickup_points = PickupPoint::all();
        return view('admin.pickup-points.index', compact('pickup_points'));
    }
    //store
    public function store(Request $request)
    {
        PickupPoint::create($request->all());
        return redirect()->route('pickup_points.index')->with('success', 'successfully add new pickup point');
    }
    //destroy
    public function destroy($id)
    {
        PickupPoint::destroy($id);
        return redirect()->route('pickup_points.index')->with('destroy', 'a pickup point has been deleted');
    }
    //edit
    public function edit($id)
    {
        $pickup_point = PickupPoint::where('id', $id)->first();
        return view('admin.pickup-points.edit', compact('pickup_point'));
    }
    //update
    public function update(Request $request, $id)
    {
        PickupPoint::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'main_phone' => $request->main_phone,
            'alternative_phone' => $request->alternative_phone,
        ]);
        return redirect()->route('pickup_points.index')->with('success', 'updated pickup point information');
    }
}
