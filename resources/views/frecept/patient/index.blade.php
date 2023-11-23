@extends('layouts.layout')
@section('title','List Patient')
@section('content')
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    /* Custom CSS */
    body {
      padding: 20px;
    }
  
    .nav-tabs {
      margin-bottom: 20px;
    }
  
    /* Optional: You can style the active tab differently */
    .nav-tabs .nav-link.active {
      background-color: #007bff;
      color: #fff;
    }
  
    /* Optional: Style the tables */
    table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      border-collapse: collapse;
    }
  
    th, td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  
    th {
      background-color: #f8f9fa;
      font-weight: bold;
    }
  </style>
</head>
<body>
  @if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
@endif
<form action="{{ url('frecept/patient/search')}}" method="get">
  <label for="search">Search</label>
  <input type="search" name="search" id="search">
  <input type="submit" value="Search">
</form>
  <ul class="nav nav-tabs">
      <li class="nav-item"><button id="l1" class="nav-link" onclick="showNew()"> New Patient</button></li>
      <li class="nav-item"><button id="l2" class="nav-link" onclick="showWait()"> Wait Patient</button></li>
      <li class="nav-item"><button id="l3" class="nav-link" onclick="showfinish()"> Finish Patient</button></li>
      <li class="nav-item"><button id="l4" class="nav-link" onclick="showsearch()"> Search Result</button></li>
    </ul>
  <div id="1" style="display: block;">
    <table class="table table-hover">
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Phone</th>
        <th>Patient Gender</th>
        <th>Patient Address</th>
        <th>Patient Symtomps</th>
        <th>Status</th>
        <th>Doctor Responsibility</th>
        <th>Action</th>
      </thead>
      <tbody>
          @foreach($patients as $p)
        <tr>
          <td>{{$p -> id}}</td>
          <td>{{$p -> name}}</td>
          <td>{{$p -> phone}}</td>
          <td>{{$p -> gender}}</td>
          <td>{{$p -> address}}</td>
          <td>{{$p -> symtomp}}</td>
          <td>{{$p -> status}}</td>
          <td>{{$p -> doctor}}</td>
          <td>
            <a class="btn btn-info btn-sm" href='{{ url("frecept/patient/update/$p->id") }}'><i class="fas fa-pencil-alt"></i> Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div id="2" style="display: none;">
    <table class="table table-hover">
      <caption>Examing</caption>
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Phone</th>
        <th>Patient Gender</th>
        <th>Patient Address</th>
        <th>Patient Symtomps</th>
        <th>Status</th>
        <th>Doctor Responsibility</th>
      </thead>
      <tbody>
          @foreach($pat as $p)
        <tr>
          <td>{{$p -> id}}</td>
          <td>{{$p -> name}}</td>
          <td>{{$p -> phone}}</td>
          <td>{{$p -> gender}}</td>
          <td>{{$p -> address}}</td>
          <td>{{$p -> symtomp}}</td>
          <td>{{$p -> status}}</td>
          <td>{{$p -> doctor}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div id="3" style="display: none;">
    <table class="table table-hover">
      <caption>Finish exam</caption>
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Phone</th>
        <th>Patient Gender</th>
        <th>Patient Address</th>
        <th>Patient Symtomps</th>
        <th>Status</th>
        <th>Doctor Responsibility</th>
        <th>Action</th>
      </thead>
      <tbody>
          @foreach($pa as $p)
        <tr>
          <td>{{$p -> id}}</td>
          <td>{{$p -> name}}</td>
          <td>{{$p -> phone}}</td>
          <td>{{$p -> gender}}</td>
          <td>{{$p -> address}}</td>
          <td>{{$p -> symtomp}}</td>
          <td>{{$p -> status}}</td>
          <td>{{$p -> doctor}}</td>
          <td><a class="btn btn-info btn-sm" href='{{ url("/frecept/patient/createExam/$p->id") }}'><i class="fas fa-pencil-alt"></i> Re-Exam</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div id="4" style="display: none;">
    <table class="table table-hover">
      <caption>Search Result</caption>
      <thead>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Patient Phone</th>
        <th>Patient Gender</th>
        <th>Patient Address</th>
        <th>Patient Symtomps</th>
        <th>Status</th>
        <th>Doctor Responsibility</th>
        <th>Action</th>
      </thead>
      <tbody>
          @foreach($search as $p)
        <tr>
          <td>{{$p -> id}}</td>
          <td>{{$p -> name}}</td>
          <td>{{$p -> phone}}</td>
          <td>{{$p -> gender}}</td>
          <td>{{$p -> address}}</td>
          <td>{{$p -> symtomp}}</td>
          <td>{{$p -> status}}</td>
          <td>{{$p -> doctor}}</td>
          <td><a class="btn btn-info btn-sm" href='{{ url("/frecept/patient/createExam/$p->id") }}'><i class="fas fa-pencil-alt"></i> Re-Exam</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    function showNew() {
        document.getElementById("1").style.display = "block";
        document.getElementById("2").style.display = "none";
        document.getElementById("3").style.display = "none";
        document.getElementById("4").style.display="none";
        document.getElementById('l1').classList.add('active');
        document.getElementById('l2').classList.remove('active');
        document.getElementById('l3').classList.remove('active');
        document.getElementById('l4').classList.remove('active')
    }

    function showWait() {
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "block";
        document.getElementById("3").style.display = "none";
        document.getElementById("4").style.display="none";
        document.getElementById('l2').classList.add('active');
        document.getElementById('l1').classList.remove('active');
        document.getElementById('l3').classList.remove('active');
        document.getElementById('l4').classList.remove('active')
    }

    function showfinish() {
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "none";
        document.getElementById("3").style.display = "block";
        document.getElementById("4").style.display="none";
        document.getElementById('l3').classList.add('active');
        document.getElementById('l1').classList.remove('active');
        document.getElementById('l2').classList.remove('active');
        document.getElementById('l4').classList.remove('active')
    }
    function showsearch() {
        document.getElementById("1").style.display = "none";
        document.getElementById("2").style.display = "none";
        document.getElementById("3").style.display = "none";
        document.getElementById("4").style.display="block";
        document.getElementById('l4').classList.add('active');
        document.getElementById('l1').classList.remove('active');
        document.getElementById('l2').classList.remove('active');
        document.getElementById('l3').classList.remove('active')
    }
</script>
</body>
@endsection