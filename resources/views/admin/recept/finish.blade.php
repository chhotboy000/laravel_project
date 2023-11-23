@extends('layouts.layout')
@section('content')
<style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #007bff;
        }

        .alert {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="date"] {
            padding: 8px;
            width: 200px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<h1>Analysize</h1>
<br>
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
    <table class="table table-hover mx-auto">
      <form action="{{ url('admin/recept/filter')}}" method="get">
        <label for="beginday">Start Date:</label>
        <input type="date" name="beginday" id="beginday">
        <label for="endday">End Date:</label>
        <input type="date" name="endday" id="endday">
        <input type="submit" value="Search">
    </form>
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient Name</th>
          <th>Service Price</th>
          <th>Medicine Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @php
          $alltotal = 0;
        @endphp
      @foreach($bill as $b)
      <tr>
          <td>{{$b->id}}</td>
          <td>{{$b->patient->name}}</td>
          <td>
            @php
                $totalServicePrice = 0;
            @endphp
            @for ($i = 1; $i < 11; $i++)
                @php
                  $ser = 'test' . $i;
                  
                  $name = App\Models\service::where('id', $b->$ser)->value('ser_name');
                  $price = App\Models\service::where('id', $b->$ser)->value('ser_price');
                @endphp 
                @if ($price != null)   
                  {{$name}}:{{$price}} <br>
                  @php
                        $totalServicePrice += $price;
                  @endphp
                @endif
            @endfor
        </td>
        <td>
          @php
            $totalMedicinePrice = 0;
          @endphp
          @for ($i = 1; $i < 11; $i++)
              @php
                  $fre = 'frequency'.$i;
                  $f = $b->$fre;
                  $day = 'days'.$i;
                  $d = $b->$day;
                  $med = 'medi' . $i;
                  $name = App\Models\medicine::where('id', $b->$med)->value('name');
                  $me = App\Models\medicine::where('id', $b->$med)->value('price');
              @endphp 
              @if ($f != null)   
              {{$name}}:{{$f * $d * $me}} <br>
              @php
                $totalMedicinePrice += ($f * $d * $me);
              @endphp
              @endif
          @endfor
        </td>
        <td>
          @php
              $total =$totalServicePrice + $totalMedicinePrice;
              $alltotal += $total;
          @endphp
          {{$total}}
        </td>
      </tr>
      @endforeach
      @php
         $alltotal;
      @endphp
        <tr>
          <td colspan="4"><strong>Total of all bills:</strong></td>
          <td>{{$alltotal}}</td>
        </tr>
      </tbody>
    </table>

@endsection