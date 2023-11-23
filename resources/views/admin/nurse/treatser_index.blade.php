@extends('layouts.layout')
@section('title','dashboard')
@section('content')
<style>
  .table {
      width: 80%;
      margin: 0 auto;
      margin-top: 20px;
  }

  .table th, .table td {
      text-align: center;
  }

  .table th {
      background-color: #f2f2f2;
  }

  .action-links a {
      margin-right: 10px;
      color: #007bff;
      text-decoration: none;
  }

  .action-links a:hover {
      text-decoration: underline;
  }
  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-secondary {
    background-color: #6c757d;
}

.btn:hover {
    background-color: #0056b3;
}

.btn-secondary:hover {
    background-color: #545b62;
}
</style>

<h1>Treat Service Category</h1>
<table class="table table-hover mx-auto">
    <thead>
      <th>ID</th>
      <th>Patient's Name</th>
      <th>Service</th>
      <th>Price</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($treatser as $p)
      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->patient->name}}</td>
        <td>
            @for ($i=1;$i<11;$i++)
              @php
                $ser = 'test' . $i;
                $se = App\Models\service::where('id', $p->$ser)->value('ser_name');
              @endphp 
              @if ($se != null)   
                {{$se}} <br>
              @endif
            @endfor
        </td>
        <td>
            @for ($i = 1; $i < 11; $i++)
                @php
                  $ser = 'test' . $i;
                  $price = App\Models\service::where('id', $p->$ser)->value('ser_price');
                @endphp 
                @if ($price != null)   
                  {{$price}} <br>
                @endif
            @endfor
        </td>
        <td>
          <a href='{{url("admin/nurse/treatser/ser_finish/$p->id")}}' class="btn btn-primary">Check</a>
          <a href='{{url("admin/nurse/treatser/ser_result/$p->id")}}' class="btn btn-secondary">Result</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection