@extends('layouts.layout')
@section('title', 'Add Service')
@section('content')
<style>
    /* Style the form container */
.container-fluid {
    margin-top: 20px;
}

/* Style the card */
.card {
    margin-top: 20px;
}

/* Style form labels */
label {
    font-weight: bold;
}

/* Style form inputs */
.form-control {
    margin-bottom: 15px;
    height: 40px;
}

/* Style form submit button */
.btn-primary {
    width: 100%;
    height: 40px;
    font-size: 16px;
}

/* Style error messages */
.alert-danger {
    margin-top: 20px;
}

/* Center the form horizontally */
.offset-md-3 {
    margin-left: 25%;
}

/* Responsive styles for smaller screens */
@media (max-width: 768px) {
    .offset-md-3 {
        margin-left: 0;
    }

    .card {
        margin-top: 0;
    }
}
</style>
<h1>Add Service</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Service</h3>
                    </div>
                    {{--errorr--}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('fnurse/service/postCreateSer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Service Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" value="{{old('name')}}" placeholder="Input Product Name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            </div>    
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="txt-name">Service Price</label>
                            <input type="number" class="form-control" id="txt-price" name="price" value="{{old('price')}}" placeholder="Input Product price" required>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer mx-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection


