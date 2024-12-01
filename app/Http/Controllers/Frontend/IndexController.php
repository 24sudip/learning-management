<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory, Course, CourseGoal, CourseSection, CourseLecture};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function CourseDetails($id, $slug) {
        $course = Course::find($id);
        return view('frontend.course.course-details', compact('course'));
    }
}
