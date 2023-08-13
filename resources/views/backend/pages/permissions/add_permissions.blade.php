@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Permission</h6>


                        <form id="myForm" method="post" action="{{ route('save.permission') }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name" id="ammenities_name" >
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Select a Group</label>
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">

                                    <option selected="" disabled="">Select Group</option>

                                    <option value="type">Property Type</option>
                                    <option value="state">State</option>
                                    <option value="amenities">Amenities</option>
                                    <option value="property">Property</option>
                                    <option value="history">Package History</option>
                                    <option value="message">Property Message</option>
                                    <option value="testimonials">Testimonials</option>
                                    <option value="agent">Manage Agent</option>
                                    <option value="category">Blog Category</option>
                                    <option value="post">Blog Post</option>
                                    <option value="comment">Blog Comment</option>
                                    <option value="smtp">SMTP Setting</option>
                                    <option value="site">Site Settings</option>
                                    <option value="role">Role & Permissions</option>
                                </select>
                            </div>
                         <button type="submit" class="btn btn-primary me-2 mt-4">Add Permission</button>
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
