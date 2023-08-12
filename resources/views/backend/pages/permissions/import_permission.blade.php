@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">


        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Import Permission</h6>


                        <form  method="post" action="{{route('import')}}" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Xlsx File Import</label>
                                <input type="file"
                                    class="form-control"
                                    name="import_file" id="file">
                            </div>
                         <button type="submit" class="btn btn-inverse-warning">Import Now</button>
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
