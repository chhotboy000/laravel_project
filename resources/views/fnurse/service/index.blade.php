@extends('layouts.layout')
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Custom CSS */
    .custom-table {
        width: 80%;
        margin: 0 auto;
        margin-top: 20px;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }

    .custom-btn-group {
        margin-top: 10px;
    }
</style>
    <div class="container">
      <h1>Service Category</h1>
      <br>
      @if(session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif
  
      <!-- Table with Bootstrap classes and custom CSS class -->
    <table class="table custom-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($service as $ser)
          <tr>
            <td>{{$ser->id}}</td>
            <td>{{$ser->ser_name}}</td>
            <td>{{$ser->ser_price}}</td>
            <td>
              <a class="btn btn-info btn-sm" href='{{url("fnurse/service/edit/$ser->id")}}'>
                  <i class="fas fa-pencil-alt"></i> Edit
              </a>
              <a class="btn btn-danger btn-sm" href='{{url("fnurse/service/delete/$ser->id")}}'>
                  <i class="fas fa-trash"></i> Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  
  <!-- Add Bootstrap JS and Popper.js (Bootstrap dependency) scripts at the end of your HTML body -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection