@extends('layouts.layout')
@section('title','dashboard')
@section('content')
<style>
  /* styles.css */

/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.container {
    margin-top: 20px;
}

/* Table Styles */
.table {
    width: 80%;
    margin: 0 auto;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.table th, .table td {
    text-align: center;
    padding: 10px;
}

.table th {
    background-color: #007bff;
    color: #fff;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Link Styles */
.action-links a {
    color: #007bff;
    text-decoration: none;
    margin-right: 10px;
}

.action-links a:hover {
    text-decoration: underline;
}
</style>
<h1>Treatmedicine Category</h1>
<table class="table table-hover mx-auto">
    <thead>
      <th>ID</th>
      <th>Patient's Name</th>
      <th>Medicine</th>
      <th>Total number</th>
      <th>Price</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($treatmed as $p) 
      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->patient->name}}</td>
        <td>
          @for ($i=1;$i<11;$i++)
          @php
            $med = 'medi' . $i;
            $me = App\Models\medicine::where('id', $p->$med)->value('name');
          @endphp 
          @if ($me != null)   
            {{$me}} <br>
          @endif
        @endfor
        </td>
        <td>
            @for ($i=1;$i<11;$i++)
            @php
                $fre = 'frequency'.$i;
                $f = $p->$fre;
                $day = 'days'.$i;
                $d = $p->$day;
            @endphp
            @if ($f != null)
            {{$f*$d}} <br>
            @endif 
            @endfor
        </td>
        <td>
            @for ($i = 1; $i < 11; $i++)
                @php
                    $fre = 'frequency'.$i;
                    $f = $p->$fre;
                    $day = 'days'.$i;
                    $d = $p->$day;
                    $med = 'medi' . $i;
                    $me = App\Models\medicine::where('id', $p->$med)->value('price');
                    //$medi = 'medi' . $i . '_id';
                    //$price = App\Models\medicine::where('id', $p->$medi)->value('price');
                @endphp 
                @if ($f != null)   
                {{$f * $d * $me}} <br>
                @endif
            @endfor
        </td>
        <td>
          <a href='{{url("fpharma/treatmed/med_finish/$p->id")}}'>check</a>
        </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection