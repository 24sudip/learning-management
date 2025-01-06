<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;

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

    public function EditRoles($id) {
        $role = Role::find($id);
        return view('admin.backend.pages.roles.edit-roles', compact('role'));
    }

    public function UpdateRoles(Request $request, $id) {
        Role::find($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id) {
        Role::find($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Add Roles Permission All Method
    public function AddRolesPermission() {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('admin.backend.pages.role-setup.add-roles-permission', compact('roles','permission_groups','permissions'));
    }

    public function RolePermissionStore(Request $request) {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
}
