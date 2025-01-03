<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission() {
        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all-permission', compact('permissions'));
    }

    public function AddPermission() {
        return view('admin.backend.pages.permission.add-permission');
    }

    public function StorePermission(Request $request) {
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);
        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id) {
        $permission = Permission::find($id);
        return view('admin.backend.pages.permission.edit-permission', compact('permission'));
    }

    public function UpdatePermission(Request $request, $id) {
        Permission::find($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id) {
        Permission::find($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
