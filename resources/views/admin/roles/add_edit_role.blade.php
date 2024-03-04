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
                <h3 class="card-title">Role Permission Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form name="userForm" id="userForm" @if(empty($roledata['id'])) action="{{url('admin/add-edit-role')}}" @else action="{{url('admin/add-edit-role/'.$roledata['id'])}}" @endif method="post">@csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" @if(!empty($roledata['name'])) value="{{$roledata['name']}}" @endif>
                  </div>
                  
                  @foreach ($modules as $module)
                    <div class="form-group">
                        <label for="{{$module['id']}}">{{$module['name']}} </label>
                       @foreach ($module['permission'] as $permission)
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}" {{in_array($permission->id,$rolePermission)? 'checked':''}}>{{$permission['name']}} 
                       @endforeach
                    </div>
                  @endforeach
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