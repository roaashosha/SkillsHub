
@extends('admin.layout')

@section('main')<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url("/")}}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Categories</h3>

                <div class="card-tools">
                  {{-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div> --}}
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-modal">Add new</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name (en)</th>
                      <th>Name (ar)</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cats as $cat )
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cat->name('en')}}</td>
                        <td>{{$cat->name('ar')}}</td>
                        <td>
                            @if($cat->active)
                               <span class="badge bg-success">Yes</span> 
                            @else
                                <span class="badge bg-danger">No</span> 
                            @endif
                        </td>
                        <td>
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                        </td>
                        </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div class="d-flex my-3 justify-content-center">
                    {{$cats->links('pagination::bootstrap-4')}}
                </div>
                
            </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add new category..</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{url('cats/store')}}" id="add-modal">
                @csrf  
                <div class="form-group">
                    <label >Name (en)</label>
                    <input type="text" name ="name-en"class="form-control">
                  </div>
                  <div class="form-group">
                    <label >Name (ar)</label>
                    <input type="text" name="name-ar" class="form-control">
                  </div>
                
              </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" form="add-modal"class="btn btn-primary">Submit</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>z

@endsection


