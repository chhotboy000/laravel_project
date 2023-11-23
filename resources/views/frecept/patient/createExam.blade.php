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
                    <form role="form" action="{{ url('frecept/patient/postReExam') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- @foreach ($pa as $p) --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-name">Symtomps</label>
                                <input type="text" placeholder="patient's symtomps" name="psym" value="{{old('sym')}}" required>
                                <input type="hidden" name="id" value="{{$pa->id}}" required>
                            
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
                        {{-- @endforeach --}}
                        
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