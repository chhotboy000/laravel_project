@extends('layouts.layout')
@section('title','Create Patient')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Account for Patient</h3>
                    </div>
                    {{-- errors --}}
                    {{-- @if(session('errors'))
                    <div class="alert alert-danger">{{session('errors')}}</div>
                    @endif --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('admin/patient/postCpatient') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Name</label>
                                <input type="text" placeholder="patient's name" name="name" value="{{old('name')}}" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-email">Email</label>
                                <input type="text" placeholder="patient's Email" name="email" value="{{old('email')}}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Password</label>
                                <input type="password" placeholder="patient's Password" name="pass" value="590cmt8" readonly>
                            @error('pass')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Phone</label>
                                <input type="text" placeholder="patient's phone number" name="phone" value="{{old('phone')}}" required>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Address</label>
                                <input type="text" placeholder="patient's address" name="add" value="{{old('add')}}" required>
                            @error('add')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Gender</label><br>
                                <input type="radio" value="Male" name="sex" checked>Male <br>
                                <input type="radio" value="Female" name="sex">Female
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Date of Birht</label>
                                <input type="date" placeholder="patient's symtomps" name="dob" value="{{old('dob')}}" required>
                            @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="txt-name">Symtomps</label>
                                <input type="text" placeholder="patient's symtomps" name="sym" value="{{old('sym')}}" required>
                            @error('sym')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="txt-name">Specialist</label>
                                <select id="firstSelect" onchange="populateOptions()">
                                    <option value="" checked>choose a specialist</option>
                                    @foreach ($spec as $d)
                                      @if ($d->specialist != null)
                                        <option value="{{$d->specialist}}">{{$d->specialist}}</option>
                                      @endif 
                                    @endforeach
                                  </select>
                                  <select id="secondSelect" name="doctor">
                                    <option value="" checked>choose a doctor</option>
                                  </select>
                                  <script>
                                    var doc = {!! json_encode($doc) !!};
                                    function populateOptions() {
                                      var firstSelect = document.getElementById('firstSelect');
                                      var secondSelect = document.getElementById('secondSelect');
                                      var selectValue = firstSelect.value;
                                      // Clear existing options
                                      secondSelect.innerHTML = '';
                                      // Generate the options based on the selected value
                                      for (var i = 0; i < doc.length; i++) {
                                        if (doc[i].specialist === selectValue) {
                                          var option = document.createElement('option');
                                          option.value = doc[i].id;
                                          option.text = doc[i].name;
                                          secondSelect.appendChild(option);
                                        }
                                      }
                                    }
                                  </script>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection