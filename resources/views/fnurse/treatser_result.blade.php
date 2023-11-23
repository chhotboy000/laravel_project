@extends('layouts.layout')
@section('title','dashboard')
@section('content')
<style>
    .custom-file {
        margin-bottom: 10px;
    }

    .custom-file-input {
        cursor: pointer;
    }

    textarea {
        width: 100%;
        height: 150px;
        resize: vertical;
        margin-bottom: 10px;
    }

    .submit-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .submit-button:hover {
        background-color: #45a049;
    }
</style>
<h1>Treatmedicine result</h1>
<form action="fnurse/ser_postresult" method="post"  enctype="multipart/form-data">
    @csrf
    <table class="table table-hover mx-auto">
        <thead>
        <th>ID</th>
        <th>Patient's Name</th>
        <th>Image</th>
        <th>Result</th>
        <th>Action</th>
        </thead>
        <tbody>
        {{-- @foreach($serres as $p) --}}
        <tr>
            <td>{{$serres->id}}</td>
            <td>{{$serres->patient->name}}</td>
            <td>
                <div class="form-group">
                <label for="image">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" required>
                            <label class="custom-file-label" for="image">Choose Image</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required>
                    <label class="custom-file-label" for="image">Choose Image</label>
                </div> --}}
            </td>
            <td>
                <textarea name="result" id="" cols="30" rows="5"></textarea>
                <input type="hidden" name="trid" value="{{$serres->id}}">
            </td>
            <td>
                <input type="submit" value="Send">
            </a>
            </td>
        </tr>
        {{-- @endforeach --}}
        </tbody>
    </table>
</form>
@endsection
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection