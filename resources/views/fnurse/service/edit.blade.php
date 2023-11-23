@extends('layouts.layout')
@section('title', 'Edit Service')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Service</h3>
                    </div>
                    {{--errorr--}}
                    @if(session('errors'))
                        <div class="alert alert-danger">
                            {{session('errors')}}
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('fnurse/service/postEdit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Service ID</label>
                                <input type="text" class="form-control" id="txt-id" name="id" value="{{$service->id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Service Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Input Service Name" value="{{$service->ser_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Service Price</label>
                                <input type="number" class="form-control" id="txt-price" name="price" placeholder="Input Product Price" value="{{$service->ser_price}}" >
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

