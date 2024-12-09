<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory, Course, CourseGoal, CourseSection, CourseLecture, Coupon};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) {
        $course = Course::find($id);
        // Check if the course is already in the cart
        $cartItem = Cart::search(function ($cartItem, $rowId) use($id) {
            return $cartItem->id === $id;
        });
        if ($cartItem->isNotEmpty()) {
            return response()->json(['error' => 'Course Is Already In Your Cart']);
        }
        if ($course->discount_price == null) {
            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor
                ]
            ]);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor' => $request->instructor
                ]
            ]);
        }
        return response()->json(['success' => 'Successfully Added On Your Cart']);
    }

    public function CartData() {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();
        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty
        ));
    }

    public function AddMiniCart() {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();
        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty
        ));
    }

    public function RemoveMiniCart($rowId) {
        Cart::remove($rowId);
        return response()->json(['success' => 'Course Removed From Cart']);
    }

    public function Mycart() {
        return view('frontend.mycart.view-mycart');
    }

    public function GetCartCourse() {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();
        return response()->json(array(
            'carts' => $carts,
            'cartTotal' => $cartTotal,
            'cartQty' => $cartQty
        ));
    }

    public function CartRemove($rowId) {
        Cart::remove($rowId);
        return response()->json(['success' => 'Course Removed From Cart']);
    }

    public function CouponApply(Request $request) {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }
}