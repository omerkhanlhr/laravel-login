@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Permission</h6>
                        <style>
                            /* Custom styles for the form */
                            .form-group {
                                margin-bottom: 20px;
                            }

                            .form-label {
                                font-size: 18px;
                                display: block;
                                margin-bottom: 10px;
                            }

                            #exampleFormControlSelect1 {
                                width: 100%;
                                padding: 10px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                font-size: 16px;
                                color: #333;
                            }
                        </style>

                        <form id="myForm" method="post" action="{{ route('update.permission') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$data->id}}">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name" id="ammenities_name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Select a Group</label>
                                <select name="group_name" id="exampleFormControlSelect1">

                                    <option selected disabled>Select Group</option>

                                    <option value="type"{{$data->group_name=='type'? 'selected' : ''}}>Property Type</option>
                                    <option value="state"{{$data->group_name=='state'? 'selected' : ''}}>State</option>
                                    <option value="amenities"{{$data->group_name=='amenities'? 'selected' : ''}}>Amenities</option>
                                    <option value="property"{{$data->group_name=='property'? 'selected' : ''}}>Property</option>
                                    <option value="history"{{$data->group_name=='history' ? 'selected' : ''}}>Package History</option>
                                    <option value="message"{{$data->group_name=='message'? 'selected' : ''}}>Property Message</option>
                                    <option value="testimonials"{{$data->group_name=='testimonials'? 'selected' : ''}}>Testimonials</option>
                                    <option value="agent"{{$data->group_name=='agent'? 'selected' : ''}}>Manage Agent</option>
                                    <option value="category"{{$data->group_name=='category'? 'selected' : ''}}>Blog Category</option>
                                    <option value="post"{{$data->group_name=='post'? 'selected' : ''}}>Blog Post</option>
                                    <option value="comment"{{$data->group_name=='comment'? 'selected' : ''}}>Blog Comment</option>
                                    <option value="smtp"{{$data->group_name=='smtp'? 'selected' : ''}}>SMTP Setting</option>
                                    <option value="site"{{$data->group_name=='site'? 'selected' : ''}}>Site Settings</option>
                                    <option value="role"{{$data->group_name=='role'? 'selected' : ''}}>Role & Permissions</option>
                                </select>
                            </div>
                         <button type="submit" class="btn btn-primary me-2">Update Permission</button>
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
