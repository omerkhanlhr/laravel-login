@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('add.permission')}}" class="btn btn-inverse-info">Add Permission</a>
            &nbsp;&nbsp;&nbsp;
            <a href="{{route('import.permission')}}" class="btn btn-inverse-warning">Import</a>
            &nbsp;&nbsp;&nbsp;
            <a href="{{route('export')}}" class="btn btn-inverse-danger">Export</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Permission Type All</h6>

    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($alladmin as $key=>$item )


          <tr>
            <td>{{ $key+1}}</td>
            <td>{{$item->name}}</td>
            <td>
                <img src="{{(!empty($item->photo)) ?
                    url('images/admin_images/'.$item->photo):url('images/no_image.jpg')}}" style="width:70px; height:40px">
            </td>
            <td>{{$item->email}}</td>
            <td>
                @foreach ($item->roles as $role)
                <span class="badge badge-pill bg-danger">{{$role->name}}</span>

                @endforeach
            </td>
            <td>
                <a href="{{route('edit.admin',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('delete.admin',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>

@endsection
