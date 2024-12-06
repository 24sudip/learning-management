<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SubCategory, Course, Wishlist, User};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $course_id) {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('course_id', $course_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'course_id' => $course_id,
                    'created_at' => now()
                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {
                return response()->json(['error' => 'This Product Is Already On Your Wishlist']);
            }
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function AllWishlist() {
        return view('frontend.wishlist.all-wishlist');
    }

    public function GetWishlistCourse() {
        $wishlist = Wishlist::with('course')->where('user_id', Auth::id())->latest()->get();
        $wishQty = $wishlist->count();
        return response()->json(['wishlist' => $wishlist,'wishQty' => $wishQty]);
    }

    public function RemoveWishlist($id) {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Course Removed']);
    }
}
