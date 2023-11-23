@extends('layouts.layout')
@section('title', 'Edit Service')
@section('content')
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.container-fluid {
    margin-top: 20px;
}

.card {
    margin-top: 20px;
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

/* Button Styles */
.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Alert Styles */
.alert {
    margin-top: 20px;
}

/* Input Styles */
.form-control {
    width: 100%;
    height: 38px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
}

/* Date Input Styles */
input[type="date"].form-control {
    height: 38px;
}

/* Footer Styles */
.card-footer {
    background-color: #f2f2f2;
    padding: 20px;
    text-align: right;
}
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Update Medicine</h2>
                    </div>
                    {{--errorr--}}
                    @if(session('errors'))
                        <div class="alert alert-danger">
                            {{session('errors')}}
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/pharma/postEdit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">ID</label>
                                <input type="text" class="form-control" id="txt-id" name="id" value="{{$medicine->id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txt-name"> Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Input Service Name" value="{{$medicine->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Quantity</label>
                                <input type="number" class="form-control" id="txt-quantity" name="quantity" placeholder="Input Product Price" value="{{$medicine->quantity}}" >
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Service Price</label>
                                <input type="number" class="form-control" id="txt-price" name="price" placeholder="Input Product Price" value="{{$medicine->price}}" >
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Type</label>
                                <input type="text" class="form-control" id="txt-type" name="type" placeholder="Input Product Price" value="{{$medicine->type}}" >
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Expire</label>
                                <input type="date" class="form-control" id="txt-expire" name="expire" placeholder="Input Name" value="{{$medicine->expire}}">
                            </div>
    
                            <div class="form-group">
                                <label for="txt-name">Import</label>
                                <input type="text" class="form-control" id="txt-import" name="import" placeholder="Input Name" value="{{$medicine->import}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
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

