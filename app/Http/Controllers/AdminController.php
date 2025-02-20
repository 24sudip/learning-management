<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Course};
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'info'
        );

        return redirect('/admin/login')->with($notification);
    }

    public function AdminLogin() {
        return view('admin.admin-login');
    }

    public function AdminProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin-profile', compact('profileData'));
    }

    public function AdminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin-images/'.$data->photo));
            $fileName = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/admin-images'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin-change-password', compact('profileData'));
    }

    public function AdminPasswordUpdate(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BecomeInstructor() {
        return view('frontend.instructor.register-instructor');
    }

    public function InstructorRegister(Request $request) {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','unique:users'],
            'password' => ['required']
        ]);
        User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'instructor',
            'status' => '0'
        ]);
        $notification = array(
            'message' => 'Instructor Registered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('instructor.login')->with($notification);
    }

    public function AllInstructor() {
        $all_instructor = User::where('role','instructor')->latest()->get();
        return view('admin.backend.instructor.all-instructor', compact('all_instructor'));
    }

    public function UpdateUserStatus(Request $request) {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0);
        $user = User::find($userId);
        if ($user) {
            $user->status = $isChecked;
            $user->save();
        }
        return response()->json(['message' => 'User Status Updated Successfully']);
    }

    public function AdminAllCourse() {
        $courses = Course::latest()->get();
        return view('admin.backend.courses.all-course', compact('courses'));
    }

    public function UpdateCourseStatus(Request $request) {
        $courseId = $request->input('course_id');
        $isChecked = $request->input('is_checked', 0);
        $course = Course::find($courseId);
        if ($course) {
            $course->status = $isChecked;
            $course->save();
        }
        return response()->json(['message' => 'Course Status Updated Successfully']);
    }

    public function AdminCourseDetails($id) {
        $course = Course::find($id);
        return view('admin.backend.courses.course-details', compact('course'));
    }

    // Admin User All Method
    public function AllAdmin() {
        $all_admin = User::where('role','admin')->get();
        return view('admin.backend.pages.admin-user.all-admin', compact('all_admin'));
    }

    public function AddAdmin() {
        $roles = Role::all();
        return view('admin.backend.pages.admin-user.add-admin', compact('roles'));
    }

    public function StoreAdmin(Request $request) {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            $role = Role::findById($request->roles);
            $user->assignRole($role);
        }

        $notification = array(
            'message' => 'New Admin Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id) {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.backend.pages.admin-user.edit-admin', compact('user','roles'));
    }

    public function UpdateAdmin(Request $request, $id) {
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $role = Role::findById($request->roles);
            $user->assignRole($role);
        }

        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id) {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
