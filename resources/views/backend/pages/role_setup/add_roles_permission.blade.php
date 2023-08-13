@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="col-md-8 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Permission</h6>

                        <form id="myForm" method="post" action="{{ route('save.permission') }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Role Name</label>

                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">

                                    <option selected="" disabled="">Select Group</option>
                                    @foreach ($roles as $role)

                                   <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox"  id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                  Permission All
                                </label>
                              </div>
                              <hr>

                              @foreach ($permissions_groups as $group)
                              <div class="row">
                                <div class="col-3">
                                    <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox"  id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                  {{$group->group_name}}
                                </label>

                                </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-check mb-2 mt-2">
                                    <input class="form-check-input" type="checkbox"  id="checkDefault">
                                <label class="form-check-label" for="checkDefault">
                                  Permission All
                                </label>
                                </div>
                              </div>
                              </div>
                              @endforeach




                         <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- middle wrapper end -->


@endsection
