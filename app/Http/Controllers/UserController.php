<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Category, Course};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index() {
        $categories = Category::latest()->limit(6)->get();
        $courses = Course::where('status', 1)->orderBy('id','ASC')->limit(6)->get();
        $course_categories = Category::orderBy('category_name','ASC')->get(['category_name','id']);
        return view('frontend.index', compact('categories','courses','course_categories'));
    }

    public function UserProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.edit-profile', compact('profileData'));
    }

    public function UserProfileUpdate(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user-images/'.$data->photo));
            $fileName = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/user-images'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function UserChangePassword() {
        return view('frontend.dashboard.change-password');
    }

    public function UserPasswordUpdate(Request $request) {
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
}
