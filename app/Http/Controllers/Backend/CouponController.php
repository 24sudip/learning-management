<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function AdminAllCoupon() {
        $coupons = Coupon::latest()->get();
        return view('admin.backend.coupon.coupon-all', compact('coupons'));
    }

    public function AdminAddCoupon() {
        return view('admin.backend.coupon.coupon-add');
    }

    public function AdminStoreCoupon(Request $request) {
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => now()
        ]);
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.coupon')->with($notification);
    }

    public function AdminEditCoupon($id) {
        $coupon = Coupon::find($id);
        return view('admin.backend.coupon.coupon-edit', compact('coupon'));
    }

    public function AdminUpdateCoupon(Request $request, $id) {
        Coupon::find($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => now()
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.coupon')->with($notification);
    }

    public function AdminDeleteCoupon($id) {
        Coupon::find($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
