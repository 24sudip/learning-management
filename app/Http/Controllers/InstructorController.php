<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function InstructorDashboard() {
        return view('instructor.index');
    }

    public function InstructorLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instructor/login');
    }

    public function InstructorLogin() {
        return view('instructor.instructor-login');
    }

    public function InstructorProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instructor.instructor-profile', compact('profileData'));
    }

    public function InstructorProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/instructor-images/'.$data->photo));
            $fileName = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('upload/instructor-images'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();
        $notification = array(
            'message' => 'Instructor Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function InstructorChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instructor.instructor-change-password', compact('profileData'));
    }

    public function InstructorPasswordUpdate(Request $request) {
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
