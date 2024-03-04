@extends('admin.layout.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error! </strong>{{Session::get('error_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form name="userForm" id="userForm" @if(empty($userdata['id'])) action="{{url('admin/add-edit-user')}}" @else action="{{url('admin/add-edit-user/'.$userdata['id'])}}" @endif method="post">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" @if(!empty($userdata['name'])) value="{{$userdata['name']}}" @else value="{{old('name')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" @if(!empty($userdata['username'])) value="{{$userdata['username']}}" @else value="{{old('username')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control select2" name="role_id" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach ($getRoles as $role)
                      <option @if(!empty($userdata['role_id']==$role['id'])) selected="" @endif value="{{$role['id']}}">{{$role['name']}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" @if(!empty($userdata['phone'])) value="{{$userdata['phone']}}" @else value="{{old('phone')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" @if(!empty($userdata['email'])) value="{{$userdata['email']}}" readonly="" @else value="{{old('email')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" @if(!empty($userdata['address'])) value="{{$userdata['address']}}" @else value="{{old('address')}}" @endif>
                  </div>
                  
                  @if(empty($userdata['password']))
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" @if(!empty($userdata['password'])) value="{{$userdata['password']}}" @else value="{{old('password')}}" @endif>
                  </div>
                  @endif
                  
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control select2" name="gender" style="width: 100%;">
                      <option>Select</option>
                      <option @if(!empty($userdata['gender']==1)) selected="" @endif value="1">Male</option>
                      <option @if(!empty($userdata['gender']==2)) selected="" @endif value="2">Female</option>
                      <option @if(!empty($userdata['gender']==3)) selected="" @endif value="3">Rather not to say</option>
                    </select>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Is Active?</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6"></div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection