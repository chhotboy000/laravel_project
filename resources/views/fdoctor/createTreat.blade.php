@extends('layouts.layout')
@section('title','Create Treatment')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Treatment</h3>
                        </div>
                        {{-- errors --}}
                        {{-- @if(session('errors'))
                        <div class="alert alert-danger">{{session('errors')}}</div>
                        @endif --}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('fdoctor/postCreate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-name">Patient Name</label>
                                    <input type="text" class="form-control" id="txt-name" value="{{$patient->name}}" readonly>
                                    <input type="hidden" name="patient_id" value="{{$patient->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Information</label>
                                    <table>
                                        <tr>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <label for="txt-name" style="font-family: Source Sans Pro; font-weight:normal">Weight</label>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <input type="text"  id="trWeight"   style="width:100px;line-height:20px; padding-right:2px;" name="weight"><span id="errWei"></span>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <label for="txt-name" style="font-family: Source Sans Pro; font-weight:normal">Height</label>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <input type="text"   id="trHeight"  style="width:100px;line-height:20px; padding-right:2px;" name="height"><span id="errHei"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <label for="txt-name" style="font-family: Source Sans Pro; font-weight:normal">Blood pressure</label>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <input type="text"   id="trBlood"  style="width:100px;line-height:20px; padding-right:2px;" name="blood"><span id="errBlo"></span>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <label for="txt-name" style="font-family: Source Sans Pro; font-weight:normal">Temperature</label>
                                            </td>
                                            <td style="line-height: 20px; height:20px; font-size:20px; text-align:left;">
                                                <input type="text"   id="trTemp"  style="width:100px;line-height:20px; padding-right:2px;" name="temp"><span id="errTem"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <select name="" id="exam" onchange="optexam()">
                                        <option value="" checked>Choose option for exam</option>
                                        <option value="1">Testing</option>
                                        <option value="2">Medicine</option>
                                    </select>
                                </div>
                                <div class="form-group" id="test" style="display: none;">
                                    <label for="txt-name">Testing</label>
                                    @for ($i=2; $i<11; $i++)
                                    <div id="test{{$i}}" style="display: none;">
                                        {{$i}}.
                                        <select name="test{{$i}}">
                                            <option value="" checked>choose type of test</option>
                                        @foreach ($service as $s)
                                           <option value={{$s->id}}>{{$s->ser_name}}</option> 
                                        @endforeach
                                        </select>
                                    </div>
                                    @endfor
                                    <button id="addTes">Click to add more</button>
                                </div>
                                <div class="form-group" id="medi" style="display: none">
                                    <label for="txt-name">Medicine</label>
                                    @for ($i=1; $i<11; $i++)
                                    <div id="medicine{{$i}}" style="display: none;">
                                        {{$i}}.
                                        <select name="medi{{$i}}" id="">
                                            <option value="" checked>choose medicine</option>
                                        @foreach ($medicine as $m)
                                            <option value="{{$m->id}}">{{$m->name}}</option>
                                        @endforeach
                                        </select>
                                        Number of days: 
                                        <input type="number" class="form-control" min=1 max=255 name="days{{$i}}" ><br>
                                        Frequency: 
                                        <input type="number" class="form-control" placeholder="pills" min=1 max="100" name="frequency{{$i}}" id="trFre{{$i}}"><span id="errFre{{$i}}"></span>
                                        <select name="time{{$i}}" id="">
                                            <option value="" checked>choose time of day</option>
                                            <option value="morning">Morning</option>
                                            <option value="afternoon">Afternoon</option>
                                            <option value="evening">Evening</option>
                                        </select>
                                    </div>
                                    @endfor
                                    <button id="addMed">Click to add more</button>
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Symptoms</label>
                                    <input type="text" class="form-control" placeholder="patient's symptoms" value="{{$patient -> symtomp}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Notes</label>
                                    <input type="text" class="form-control" placeholder="doctor's notes" name="note">
                                </div>
                                <div class="form-group">
                                    <label for="txt-name">Date re_exam</label>
                                    <input type="date" class="form-control" name="dateReExam">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer" style="text-align: center">
                                <input type="hidden" value="1" name="test1">
                                <button type="submit" class="btn btn-primary" style="border-radius: 10px; background-color:rgb(45, 173, 45)">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let clickCountME = 0;

        document.getElementById("addMed").addEventListener("click", function(event) {
            event.preventDefault();
            clickCountME++;

            switch(clickCountME)
            {
                case 1:
                    document.getElementById("medicine1").style.display = "block";
                    break;
                case 2: 
                    document.getElementById("medicine2").style.display = "block";
                    break;
                case 3: 
                    document.getElementById("medicine3").style.display = "block";
                    break;
                case 4: 
                    document.getElementById("medicine4").style.display = "block";
                    break;
                case 5: 
                    document.getElementById("medicine5").style.display = "block";
                    break;
                case 6: 
                    document.getElementById("medicine6").style.display = "block";
                    break;
                case 7: 
                    document.getElementById("medicine7").style.display = "block";
                    break;
                case 8: 
                    document.getElementById("medicine8").style.display = "block";
                    break;
                case 9: 
                    document.getElementById("medicine9").style.display = "block";
                    break;
                case 10: 
                    document.getElementById("medicine10").style.display = "block";
                    break;
                default:
                    break;    
            } 
        });
    </script>
    <script>
        let clickCountTE = 0;

        document.getElementById("addTes").addEventListener("click", function(event) {
            event.preventDefault();
            clickCountTE++;

            switch(clickCountTE)
            {
                case 1:
                    document.getElementById("test1").style.display = "block";
                    break;
                case 2: 
                    document.getElementById("test2").style.display = "block";
                    break;
                case 3: 
                    document.getElementById("test3").style.display = "block";
                    break;
                case 4: 
                    document.getElementById("test4").style.display = "block";
                    break;
                case 5: 
                    document.getElementById("test5").style.display = "block";
                    break;
                case 6: 
                    document.getElementById("test6").style.display = "block";
                    break;
                case 7: 
                    document.getElementById("test7").style.display = "block";
                    break;
                case 8: 
                    document.getElementById("test8").style.display = "block";
                    break;
                case 9: 
                    document.getElementById("test9").style.display = "block";
                    break;
                case 10: 
                    document.getElementById("test10").style.display = "block";
                    break;
                default:
                    break;    
            } 
        });
    </script>
    <script>
        function optexam() {
            var select = document.getElementById('exam');
            var val = select.value;
            if(val == "1")
            {
                document.getElementById("test").style.display = "block";
                document.getElementById("medi").style.display = "none";
            }
            else if (val == "2")
            {
                document.getElementById("medi").style.display = "block";
                document.getElementById("test").style.display = "none";
            }  
        }
    </script>
@endsection
{{-- @section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection --}}
