@extends('admin.layout.layout')
@section('content')
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>{{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ROLE</th>
                    
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($roles as $role)
                  <tr>
                    <td>{{$role->name}}</td>
                    
                    <td>
                        @if($role->id == 1)
                          Default Role
                        @else
                        <div class="btn-group">
                          <button type="button" class="btn btn-default">Action</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="{{url('admin/add-edit-role/'.$role->id)}}">Edit</a>
                              <a class="dropdown-item confirmDelete" name="roles" title="Delete Role" href="javascript:void(0)" record="roles" recordid="{{$role->id}}">Delete</a>
                          </div>
                      </div>
                      @endif
                    </td>
                  </tr>
                  
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 @endsection