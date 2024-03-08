<?php 
use App\Models\RolePermission;
use App\Models\Permission;

function permissionHelper(){
    $id = Auth::guard('admin')->user()->role_id;
    if($id==1){
        $roleper = Permission::select('id as permission_id')->get()->toArray();
    }else{
        $roleper = RolePermission::where('role_id',$id)->select('permission_id')->get()->toArray();
    }
    
    return $roleper;
}