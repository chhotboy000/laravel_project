@extends('layouts.layout')
@section('title','List Patient')
@section('content')
<style>
  .active{
    background-color: rgb(67, 67, 234);
    color: white;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <ul class="nav nav-tabs">
        <li class="nav-item"><button id="l1" class="nav-link" onclick="showNew()"> New Patient</button></li>
        <li class="nav-item"><button id="l2" class="nav-link" onclick="showWait()"> Wait Patient</button></li>
      </ul>
  {{-- status  --}}
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    
  <div>
    <div id="1" style="display: block;">
    <table class="table table-bordered table-hover">
      <caption>New Patient</caption>
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Gender</th>
        <th>Patient symtomps</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ( $patients as $p )
        <tr>
          <td >{{ $p -> id }}</td>
          <td >{{ $p -> name }}</td>
          <td >{{ $p -> gender }}</td>
          <td >{{ $p -> symtomp }}</td>
          <td >
            <a class="btn btn-info btn-sm" href='{{ url("/fdoctor/createTreat/$p->id") }}'><i class="fas fa-pencil-alt"></i> Exam</a>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table></div>
    <div id="2" style="display: none;">
    <table id="wp" class="table table-bordered table-hover">
      <caption>Waiting Patient</caption>
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Gender</th>
        <th>Patient symtomps</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ( $waitpa as $w )
        <tr>
          <td >{{ $w -> id }}</td>
          <td >{{ $w -> name }}</td>
          <td >{{ $w -> gender }}</td>
          <td >{{ $w -> symtomp }}</td>
          <td >
            @php
            $id=null;
              foreach($treatment as $treat){
                if($treat != null){
                  if ($treat->patient_id == $w->id){
                    $id = $treat->id;
                    break;
                  }}}
            @endphp
            <a class="btn btn-info btn-sm" href='{{ url("/fdoctor/editTreat/$id") }}'><i class="fas fa-pencil-alt"></i> Edit Exam</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table></div>
  </div>
  <script>
        function showNew()
        {
        document.getElementById("1").style.display = "block";
        document.getElementById("2").style.display = "none";
        document.getElementById('l1').classList.add('active');
        document.getElementById('l2').classList.remove('active');
        }
        function showWait()
        {
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "block";
        document.getElementById('l2').classList.add('active');
        document.getElementById('l1').classList.remove('active');
        }
    </script>
@endsection