@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
    .form-check-label{
        text-transform:capitalize;
    }
    </style>
    <div class="page-content">

        <div class="col-md-8 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Admin</h6>

                        <form id="myForm" method="post" action="{{ route('update.admin',$user->id) }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name" id="name" value="{{$user->name}}" >

                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control"
                                    name="email" id="email" value="{{$user->email}}">

                            </div>

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Role</label>

                                <select name="role" class="form-select" id="exampleFormControlSelect1">

                                    <option selected="" disabled="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"{{$user->hasRole($role->name)? 'selected' : ''}}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- middle wrapper end -->

@endsection
