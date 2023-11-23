@extends('layouts.layout')
@section('title', 'Add Staff')
@section('content')
<style>
    .form-group {
    margin-bottom: 20px;
}

/* Style the input fields */
input[type="text"],
input[type="password"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the submit button */
.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Style the card */
.card {
    margin-top: 20px;
}

/* Style the error alert */
.alert-danger {
    margin-top: 20px;
}

/* Center the form horizontally */
.offset-md-3 {
    margin-left: 25%;
}

/* Additional styles for the select dropdown */
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: white;
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
<h1>Add User</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    {{--errorr--}}
                    
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/user/postCreate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group" >
                                <label for="txt-name">Name</label>
                                <input type="text" placeholder="patient's name" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Email</label>
                                <input type="text" placeholder="patient's phone number" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Password</label>
                                <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" placeholder="Password" name="password_confirmation" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Role</label>
                                {{-- <input type="number" placeholder="Jobs" name="adrole"> --}}
                                <select  name="role" id="doc" required onchange="optrole()">
                                    <option value="" checked>Select Role</option>
                                    <option value="2" >Doctor</option>
                                    <option value="3">Nurse</option>
                                    <option value="4">Receptionist</option>
                                    <option value="5">Pharmacist</option>
                                </select>
                            </div>
                            <div class="form-group" id="spec" style="display: none">
                                <label for="txt-name">Specialist</label>
                                <select name="spec" id="" >
                                    <option value="" checked>Select your specialist</option>
                                    <option value="Internal Medicine" name="spec">Internal Medicine</option>
                                    <option value="General Surgery" name="spec">General Surgery</option>
                                    <option value="Dentistry" name="spec">Dentistry</option>
                                    <option value="Obstetrics and Gynecology" name="spec">Obstetrics and Gynecology</option>
                                    <option value="Otolaryngology" name="spec">Otolaryngology</option>
                                    <option value="Dermatology" name="spec">Dermatology</option>
                                    <option value="Nuclear Medicine" name="spec">Nuclear Medicine</option>
                                    <option value="Community Medicine" name="spec">Community Medicine</option>
                                    <option value="Preventive Medicine" name="spec">Preventive Medicine</option>
                                    <option value="Sports Medicine" name="spec">Sports Medicine</option>
                                    <option value="Traditional Medicine" name="spec">Traditional Medicine</option>
                                </select>
                            
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Date In</label>
                                <input type="date" name="din" value="{{old('din')}}">
                            @error('din')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Date of Birth</label>
                                <input type="date" name="dob" value="{{old('dob')}}">
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Salary</label>
                                <input type="number" placeholder="Salary" name="salary" value="{{old('salary')}}">
                            @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
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
<script>
    function optrole() {
        var select = document.getElementById('doc');
        var val = select.value;
        if(val == "2")
        {
            document.getElementById("spec").style.display = "block";
        }
    }
</script>
@endsection
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection