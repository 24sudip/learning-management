<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ActiveUserController extends Controller
{
    public function AllUser() {
        $users = User::where('role','user')->latest()->get();
        return view('admin.backend.user.user-all', compact('users'));
    }

    public function AllInstructor() {
        $users = User::where('role','instructor')->latest()->get();
        return view('admin.backend.user.instructor-all', compact('users'));
    }
}
