<?php

namespace App\Http\Controllers\Admin\Offers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //index
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.offers.coupon.index', compact('coupons'));
    }
    //store
    public function store(Request $request)
    {
        Coupon::create($request->all());
        return redirect()->route('offers.coupon.index')->with('success', 'successfully added new coupon offer');
    }
    //destroy
    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('offers.coupon.index')->with('destroy', 'a coupon has been deleted');
    }
    //edit
    public function edit($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        return view('admin.offers.coupon.edit', compact('coupon'));
    }
    //update
    public function update(Request $request, $id)
    {
        Coupon::where('id', $id)->update([
            'coupon_code' => $request->coupon_code,
            'type' => $request->type,
            'coupon_amount' => $request->coupon_amount,
            'valid_date' => $request->valid_date,
        ]);
        return redirect()->route('offers.coupon.index')->with('success', 'update coupon info');
    }
}
