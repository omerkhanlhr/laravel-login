@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Ammenitie</h6>

                        <form method="post" action="{{ route('save.ammenitie') }}" class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Ammenitie Name</label>
                                <input type="text"
                                    class="form-control @error('ammenities_name')
                                        is-invalid @enderror"
                                    name="ammenities_name" id="ammenities_name" >
                                @error('ammenities_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
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
@endsection
