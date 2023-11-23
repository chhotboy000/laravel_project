@extends('layouts.layout')
@section('title','Edit Patient')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Patient</h3>
                        </div>
                        {{-- errors --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('admin/patient/postEditPatient') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Patient Id</label>
                                    <input type="text" class="form-control" id="txt-name" name="id" value="{{$patient->id}}" readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Patient Name</label>
                                    <input type="text" class="form-control" id="txt-name" name="name" value="{{$patient->name}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Patient Phone</label>
                                    <input type="text" class="form-control" id="txt-name" name="phone" value="{{$patient->phone}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Patient Address</label>
                                    <input type="text" class="form-control" id="txt-name" name="add" value="{{$patient->address}}">
                                    @error('add')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="txt-name">Patient Gender</label>
                                    <input type="text" class="form-control" id="txt-name" name="sex" value="{{$patient->gender}}" readonly>
                                    {{-- <input type="radio" value="Male" name="sex" checked>Male <br>
                                    <input type="radio" value="Female" name="sex">Female --}}
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
