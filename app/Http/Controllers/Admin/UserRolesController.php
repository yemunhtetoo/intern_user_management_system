<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Feature;
use App\Models\RolePermission;
use DB;
use Session;
class UserRolesController extends Controller
{
    public function roles(){
        Session::put('page','roles');
        $roles = Role::get();
        // dd($roles);
        return view('admin.roles.roles')->with(compact('roles'));
    }

    public function deleteRole($id){
        Role::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Role record deleted successfully');
    }

    public function addEditRoles(Request $request,$id=null){
        Session::put('page','create-roles');
        $modules = Feature::with('permission')->get();

        if($id==""){
            $title = "Add Role";
            $roledata = new Role;
            $rolePermission = [];
            $message = "New Role added successfully";

        }else {
            $title = "Edit Role";
            $roledata = Role::find($id);
            $rolePermission = RolePermission::where('role_id',$roledata->id)->pluck('permission_id')->all();
            $message = "Role Updated Successfully";
        }
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name' => 'required',
                
            ];

            $customMessages = [
                'name.required' => 'Name is required',
            ];
            
            $this->validate($request,$rules,$customMessages);
            
            $roledata->name = $data['name'];
            $roledata->save();
            $getRoleId = $roledata->id;
            if(isset($data['permission'])){
                RolePermission::where('role_id',$getRoleId)->delete();
                foreach($data['permission'] as $value){ 
                    $role_permission = new RolePermission;
                    $role_permission->role_id = $getRoleId;
                    $role_permission->permission_id = $value;
                    $role_permission->save();
                }
            }
            // else if(Auth::guard('admin')->user()->role_id==1){
            //     RolePermission::where('role_id',1)->delete();
            //     $role_permission = new RolePermission;
            // }
            else{
                return redirect('admin/roles')->with('success_message',$message);
            }           

            return redirect('admin/roles')->with('success_message',$message);
        }
        return view('admin.roles.add_edit_role')->with(compact('title','roledata','modules','rolePermission'));
    }
}
