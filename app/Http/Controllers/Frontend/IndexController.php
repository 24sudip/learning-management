<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory, Course, CourseGoal, CourseSection, CourseLecture, User};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function CourseDetails($id, $slug) {
        $course = Course::find($id);
        $course_goals = CourseGoal::where('course_id', $id)->orderBy('id','DESC')->get();
        $instructor_courses = Course::where('instructor_id', $course->instructor_id)->orderBy('id','DESC')->get();
        $categories = Category::latest()->get();
        $related_courses = Course::where('category_id', $course->category_id)->where('id','!=', $id)->orderBy('id','DESC')
        ->limit(3)->get();
        return view('frontend.course.course-details', compact('course','course_goals','instructor_courses','categories','related_courses'));
    }

    public function CategoryCourse($id, $slug) {
        $courses = Course::where('category_id', $id)->where('status', 1)->get();
        $category = Category::where('id', $id)->first();
        $categories = Category::latest()->get();
        return view('frontend.category.category-all', compact('courses','category','categories'));
    }

    public function SubCategoryCourse($id, $slug) {
        $courses = Course::where('sub_category_id', $id)->where('status', 1)->get();
        $sub_category = SubCategory::where('id', $id)->first();
        $categories = Category::latest()->get();
        return view('frontend.category.sub-category-all', compact('courses','sub_category','categories'));
    }

    public function InstructorDetails($id) {
        $instructor = User::find($id);
        $courses = Course::where('instructor_id', $id)->get();
        return view('frontend.instructor.instructor-details', compact('instructor','courses'));
    }
}
