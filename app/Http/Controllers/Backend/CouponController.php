<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Coupon, Course};
use Illuminate\Support\Facades\Auth;

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

    // Instructor All Coupon Method
    public function InstructorAllCoupon() {
        $id = Auth::user()->id;
        $coupons = Coupon::where('instructor_id', $id)->latest()->get();
        return view('instructor.coupon.coupon-all', compact('coupons'));
    }

    public function InstructorAddCoupon() {
        $id = Auth::user()->id;
        $courses = Course::where('instructor_id', $id)->get();
        return view('instructor.coupon.coupon-add', compact('courses'));
    }
}
