@extends('layouts.layout')
@section('title', 'Edit Staff')
@section('content')
<h1>Edit User</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    {{-- errorr
                    @if(session('errors'))
                        <div class="alert alert-danger">
                            {{session('errors')}}
                        </div>
                    @endif --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/user/postEditAdmin' ,['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">User ID</label>
                                <input type="text" class="form-control" id="txt-id" name="id" value="{{$user->id}}" readonly>
                                
                            </div>
                            <div class="form-group">
                                <label for="txt-name">User Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" placeholder="Input Name" value="{{$user->name}}" >
                             @error('name')
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
                                    <option value="6">Retire</option>
                                </select>
                            </div>
                            {{--  --}}
                            <div class="form-group" id="spec" style="display: {{ $user->role == 2 ? 'block'  : 'none' }}">
                                <label for="txt-name">Specialist</label>
                                <select name="spec" id="" required>
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
                                <label for="txt-name">Salary</label>
                                <input type="number" class="form-control" id="txt-price" name="salary" placeholder="Input Salary" value="{{$user->salary}}" >
                                @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
<script>
    // function optrole() 
    // {
    //     var select = document.getElementById('doc');
    //     var val = select.value;
    //     if (val == "2") {
    //         document.getElementById("spec").style.display = "block";
    //     } else {
    //         document.getElementById("spec").style.display = "none";
    //     }
    // }
    // document.addEventListener('DOMContentLoaded', function () {
    //     // Call optrole() on page load
    //     optrole();
    // });

    // function optrole() {
    //     var select = document.getElementById('doc');
    //     var val = select.value;
    //     var specDiv = document.getElementById("spec");

    //     if (val == "2") {
    //         specDiv.style.display = "block";
    //     } else {
    //         specDiv.style.display = "none";
    //     }
    // }
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

