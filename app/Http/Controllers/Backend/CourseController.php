<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory, Course, CourseGoal, CourseSection, CourseLecture};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllCourse()
    {
        $id = Auth::user()->id;
        $courses = Course::where('instructor_id', $id)->orderBy('id','desc')->get();
        return view('instructor.courses.all-course', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddCourse()
    {
        $categories = Category::latest()->get();
        return view('instructor.courses.add-course', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function GetSubCategory($category_id)
    {
        $subcategory = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name','ASC')->get();
        return json_encode($subcategory);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function StoreCourse(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4|max:10240'
        ]);
        $manager = new ImageManager(new Driver());
        $image = $request->file('course_image');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(370,246);
        $img->toJpeg(80)->save(base_path('public/upload/course/thumbnail/'. $name_gen));
        $save_url = 'upload/course/thumbnail/'. $name_gen;

        $video = $request->file('video');
        $video_name = time().'.'. $video->getClientOriginalExtension();
        $video->move(public_path('upload/course/video/'), $video_name);
        $save_video = 'upload/course/video/'. $video_name;

        $course_id = Course::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'instructor_id' => Auth::user()->id,
            'course_image' => $save_url,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_name_slug' => strtolower(str_replace(' ','-', $request->course_name)),
            'description' => $request->description,
            'video' => $save_video,
            'label' => $request->label,
            'duration' => $request->duration,
            'resources' => $request->resources,
            'certificate' => $request->certificate,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'prerequisites' => $request->prerequisites,
            'best_seller' => $request->best_seller,
            'featured' => $request->featured,
            'highest_rated' => $request->highest_rated,
            'status' => 1,
            'created_at' => now()
        ]);
        $goals = count($request->course_goals);
        if ($goals != null) {
            for ($i=0; $i < $goals; $i++) {
                $g_count = new CourseGoal();
                $g_count->course_id = $course_id;
                $g_count->goal_name = $request->course_goals[$i];
                $g_count->save();
            }
        }
        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
        // if ($request->file('course_image')) {
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditCourse($id)
    {
        $course = Course::find($id);
        $goals = CourseGoal::where('course_id', $id)->get();
        $categories = Category::latest()->get();
        $sub_categories = SubCategory::latest()->get();
        return view('instructor.courses.edit-course', compact('course','categories','sub_categories','goals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateCourse(Request $request, $id)
    {
        Course::find($id)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'instructor_id' => Auth::user()->id,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_name_slug' => strtolower(str_replace(' ','-', $request->course_name)),
            'description' => $request->description,
            'label' => $request->label,
            'duration' => $request->duration,
            'resources' => $request->resources,
            'certificate' => $request->certificate,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'prerequisites' => $request->prerequisites,
            'best_seller' => $request->best_seller,
            'featured' => $request->featured,
            'highest_rated' => $request->highest_rated,
        ]);
        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }

    public function UpdateCourseImage(Request $request, $id) {
        $old_image = Course::find($id)->course_image;

        $manager = new ImageManager(new Driver());
        $image = $request->file('course_image');
        $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(370,246);
        $img->toJpeg(80)->save(base_path('public/upload/course/thumbnail/'. $name_gen));
        $save_url = 'upload/course/thumbnail/'. $name_gen;

        if (file_exists($old_image)) {
            unlink($old_image);
        }
        Course::find($id)->update([
            'course_image' => $save_url
        ]);
        $notification = array(
            'message' => 'Course Image Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateCourseVideo(Request $request, $id) {
        $old_video = Course::find($id)->video;

        $video = $request->file('video');
        $video_name = time().'.'. $video->getClientOriginalExtension();
        $video->move(public_path('upload/course/video/'), $video_name);
        $save_video = 'upload/course/video/'. $video_name;

        if (file_exists($old_video)) {
            unlink($old_video);
        }
        Course::find($id)->update([
            'video' => $save_video
        ]);
        $notification = array(
            'message' => 'Course Video Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateCourseGoal(Request $request, $id) {
        if ($request->course_goals == null) {
            return redirect()->back();
        } else {
            CourseGoal::where('course_id', $id)->delete();
            $goals = count($request->course_goals);
            for ($i=0; $i < $goals; $i++) {
                $g_count = new CourseGoal();
                $g_count->course_id = $id;
                $g_count->goal_name = $request->course_goals[$i];
                $g_count->save();
            }
        }
        $notification = array(
            'message' => 'Course Goals Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function DeleteCourse($id)
    {
        $course = Course::find($id);
        unlink($course->course_image);
        unlink($course->video);
        $course->delete();
        CourseGoal::where('course_id', $id)->delete();
        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AddCourseLecture($id) {
        $course = Course::find($id);
        $course_sections = CourseSection::where('course_id', $id)->latest()->get();
        return view('instructor.courses.section.add-lecture', compact('course','course_sections'));
    }

    public function AddCourseSection(Request $request) {
        $c_id = $request->id;
        CourseSection::insert([
            'course_id' => $c_id,
            'section_title' => $request->section_title
        ]);
        $notification = array(
            'message' => 'Course Section Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SaveLecture(Request $request) {
        $lecture = new CourseLecture();
        $lecture->course_id = $request->course_id;
        $lecture->section_id = $request->section_id;
        $lecture->lecture_title = $request->lecture_title;
        $lecture->url = $request->lecture_url;
        $lecture->content = $request->content;
        $lecture->save();
        return response()->json(['success' => 'Lecture Saved Successfully']);
    }

    public function EditLecture($id) {
        $course_lecture = CourseLecture::find($id);
        return view('instructor.courses.lecture.edit-lecture', compact('course_lecture'));
    }

    public function UpdateLecture(Request $request, $id) {
        CourseLecture::find($id)->update([
            'lecture_title' => $request->lecture_title,
            'url' => $request->url,
            'content' => $request->content
        ]);
        $notification = array(
            'message' => 'Course Lecture Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteLecture($id) {
        CourseLecture::find($id)->delete();
        $notification = array(
            'message' => 'Course Lecture Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteSection(Request $request, $id) {
        $course_section = CourseSection::find($id);
        // Delete Related Lecture
        $course_section->course_lectures()->delete();
        // Delete Section
        $course_section->delete();
        $notification = array(
            'message' => 'Course Section Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
