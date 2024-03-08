
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
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
   <?php  $collection = permissionHelper();?>
    @foreach ($collection as $item)
        @if($item['permission_id']===1)
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
    
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="users" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>USER</th>
                        <th>USERNAME</th>
                        <th>ROLE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                          @foreach ($users as $user)
                          <tr>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['username']}}</td>
                              <td>{{$user['role']['name']}}</td>
                            <td>
                                @if($user['status']==1)
                                <button type="button" class="btn btn-primary btn-sm">Active</button>
                                @else
                                <button type="button" class="btn btn-warming btn-sm">Inctive</button>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">View </a>
                                        @if($item['permission_id']===1 || $item['permission_id']===3)
                                        <a class="dropdown-item" href="{{url('admin/add-edit-user/'.$user->id)}}">Edit</a>
                                        @endif
                                        @if($item['permission_id']===1 || $item['permission_id']===4)
                                        <a class="dropdown-item confirmDelete" name="users" title="Delete User" href="javascript:void(0)" record="users" recordid="{{$user->id}}">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                          </tr>
                          
                          @endforeach
                         
                      
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                      </tfoot>
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
        @endif
    @endforeach
    
    <!-- /.content -->
  </div>
 @endsection