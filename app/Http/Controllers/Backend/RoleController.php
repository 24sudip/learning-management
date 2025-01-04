<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;

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

    public function ImportPermission() {
        return view('admin.backend.pages.permission.import-permission');
    }

    public function Export() {
        return Excel::download(new PermissionExport, 'Permission.xlsx');
    }

    public function Import(Request $request) {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllRoles() {
        $roles = Role::all();
        return view('admin.backend.pages.roles.all-roles', compact('roles'));
    }

    public function AddRoles() {
        return view('admin.backend.pages.roles.add-roles');
    }

    public function StoreRoles(Request $request) {
        Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
}
