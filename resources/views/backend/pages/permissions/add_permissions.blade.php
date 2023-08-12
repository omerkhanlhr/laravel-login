@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Ammenitie</h6>

                        <form id="myForm" method="post" action="{{ route('save.ammenitie') }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name" id="ammenities_name" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Group Name</label>
                                <select name="group_name" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="rent">For Rent</option>
                                    <option value="buy">For Buy</option>
                                    <option value="buy">For Buy</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Add Ammenitie</button>
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
    {{-- <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    ammenities_name: {
                        required : true,
                    },

                },
                messages :{
                    ammenities_name: {
                        required : 'Please Enter Ammenitie Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script> --}}
@endsection
