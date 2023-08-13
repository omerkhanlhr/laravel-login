@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Permission Type All</h6>

    <div class="table-responsive">
      <table  class="table">
        <thead>
          <tr>
            <th>Sr.No.</th>
            <th>Name</th>
            <th>Group Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key=>$item )


          <tr>
            <td>{{ $key+1}}</td>
            <td>{{$item->name}}</td>
            <td>
                @foreach ($item->permissions as $prem)
                <span class="badge bg-danger">{{$prem->name}}</span>
                @endforeach
            </td>
            <td>
                <a href="{{route('admin.edit.permission',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                <a href="{{route('admin.delete.permission',$item->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
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
