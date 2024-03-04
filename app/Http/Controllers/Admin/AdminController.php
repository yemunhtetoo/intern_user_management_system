<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Gate;
use Validator;
use Session;
use Hash;


class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required'
            ];
            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password");
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function users(){
        
        Session::put('page','users');
        $users = Admin::where('status',1)->get();      
        $roles = Admin::with('role')->get()->toArray();
        return view('admin.users.users')->with(compact('users','roles'));
    }

    public function addEditUsers(Request $request, $id = null){
        
        Session::put('page','create-users');
        $getRoles = Role::get()->toArray();
        // dd($getRoles);
        if($id==""){
            $title = "Add Users";
            $userdata = new Admin;
            $message = "New User added successfully";
        }else {
            $title = "Edit Subadmin";
            $userdata = Admin::find($id);
            $message = "User Updated Successfully";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            
            if($id==""){
              $rules = [
                'password'=>'required',
                'name' => 'required',
                'username' => 'required',
                'role_id' => 'required',
                'email' => 'required|email|max:255',
                'phone' => 'required|numeric'
              ];}
              else{
                $rules = [
                    'name' => 'required',
                    'username' => 'required',
                    'role_id' => 'required',
                    'email' => 'required|email|max:255',
                    'phone' => 'required|numeric'
                  ];
              }

              $customMessages = [
                'name.required' => 'Name is required',
                'phone.required' => 'Phone no. is required',
                'password.required' => 'Password is required',
                'phone.numeric' => 'Valid Phone no. is required',
                'username.required' => 'Username is required',
                'role_id.required' => 'Role is required',
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                
            ];
            
            $this->validate($request,$rules,$customMessages);

            $userdata->name = $data['name'];
            $userdata->username = $data['username'];
            $userdata->role_id = $data['role_id'];
            $userdata->phone = $data['phone'];
            if($id==""){
                $userdata->email = $data['email'];
                $userdata->password = bcrypt($data['password']);
            }
            $userdata->address = $data['address'];
            $userdata->gender = $data['gender'];
            $userdata->status = 1;
            $userdata->save();
            return redirect('admin/users')->with('success_message',$message);
            if($id==""){
                $userCount = Admin::where('email',$data['email'])->count();
                if($userCount>0){
                    return redirect()->back()->with('error_message','User aleary exits');
                }
            }
        }
        return view('admin.users.add_edit_user')->with(compact('title','userdata','getRoles'));
    }

    public function deleteUser($id){
        Admin::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Users record deleted successfully');
    }
}
