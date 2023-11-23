@extends('layouts.layout')
@section('title', 'Add Medicine')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Custom CSS for form container */
    .container-fluid {
        margin-top: 20px;
    }

    /* Custom CSS for form labels */
    label {
        font-weight: bold;
    }

    /* Custom CSS for form inputs */
    .form-control {
        margin-bottom: 20px;
    }

    /* Custom CSS for form submit button */
    .btn-primary {
        width: 100%;
        height: 40px;
        font-size: 16px;
    }

    /* Custom CSS for form footer */
    .card-footer {
        text-align: center;
    }
</style>
<!-- Content in your HTML body -->
<div class="container-fluid">
    <h1 class="mt-4 mb-4">Add Medicine</h1>

    <div class="row">
        <div class="offset-md-3 col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Medicine</h3>
                </div>
                <form role="form" action="{{url('fpharma/postCreate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="txt-name">Medicine Name</label>
                        <input type="text" class="form-control" id="txt-name" value="{{ old('name') }}" name="name" placeholder="Input Name" required>
                        {{-- @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                        @endif --}}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                       
                    </div>

                    <div class="form-group">
                        <label for="txt-name">Quantity</label>
                        <input type="number" class="form-control" id="txt-quantity" value="{{ old('quantity') }}" name="quantity" placeholder="Input quantity" required>
                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- @if ($errors->has('quantity'))
                        <span class="error">{{ $errors->first('quantity') }}</span>
                        @endif --}}
                    </div>
                    
                    <div class="form-group">
                        <label for="txt-name">Price</label>
                        <input type="number" class="form-control" id="txt-price" value="{{ old('price') }}" name="price" placeholder="Input Name" required>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- @if ($errors->has('price'))
                        <span class="error">{{ $errors->first('price') }}</span>
                        @endif --}}
                    </div>

                    <div class="form-group">
                        <label for="txt-name">Type</label>
                        <input type="text" class="form-control" id="txt-type" value="{{ old('type') }}" name="type" placeholder="Input Name" required>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- @if ($errors->has('type'))
                        <span class="error">{{ $errors->first('type') }}</span>
                        @endif --}}
                    </div>

                    <div class="form-group">
                        <label for="txt-name">Expire</label>
                        <input type="date" class="form-control" id="txt-expire" value="{{ old('date') }}" name="date" placeholder="Input Name" required>
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- @if ($errors->has('date'))
                        <span class="error">{{ $errors->first('date') }}</span>
                        @endif --}}
                    </div>

                    <div class="form-group">
                        <label for="txt-name">Import</label>
                        <input type="text" class="form-control" id="txt-import" value="{{ old('import') }}" name="import" placeholder="Input Name" required>
                        @error('import')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- @if ($errors->has('import'))
                        <span class="error">{{ $errors->first('import') }}</span>
                        @endif --}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer mx-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Bootstrap JS and Popper.js (Bootstrap dependency) scripts at the end of your HTML body -->

@endsection
@section('script-section')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection