@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                                  <h6 class="card-title">Edit Role Info</h6>

                                  <form method="post" action="{{route('update.role')}}" class="forms-sample">
                                    @csrf
                                    <input type="hidden" value="{{$data->id}}" name="id">
                                    <div class="mb-3">
                                          <label for="type_name" class="form-label">Role Name</label>
                                          <input type="text" class="form-control" name="name" value="{{$data->name}}" id="name" >
                                      </div>

                                      <button type="submit" class="btn btn-primary me-2">Update</button>
                                  </form>

                </div>
              </div>
              </div>
            </div>
          </div>

      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      </div>
      <!-- right wrapper end -->
    </div>

        </div>


@endsection
