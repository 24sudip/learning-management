<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request) {
        $course = $request->course_id;
        $instructor = $request->instructor_id;
        $request->validate([
            'comment' => 'required'
        ]);
        Review::insert([
            'course_id' => $course,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'instructor_id' => $instructor,
            'created_at' => now()
        ]);
        $notification = array(
            'message' => 'Review Will Be Approved By Admin',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminPendingReview() {
        $reviews = Review::where('status', 0)->orderBy('id','DESC')->get();
        return view('admin.backend.review.pending-review', compact('reviews'));
    }

    public function UpdateReviewStatus(Request $request) {
        $reviewId = $request->input('review_id');
        $isChecked = $request->input('is_checked', 0);
        $review = Review::find($reviewId);
        if ($review) {
            $review->status = $isChecked;
            $review->save();
        }
        return response()->json(['message' => 'Review Status Updated Successfully']);
    }

    public function AdminActiveReview() {
        $reviews = Review::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.backend.review.active-review', compact('reviews'));
    }

    public function InstructorAllReview() {
        $id = Auth::user()->id;
        $reviews = Review::where('instructor_id', $id)->where('status', 1)->orderBy('id','DESC')->get();
        return view('instructor.review.active-review', compact('reviews'));
    }
}
