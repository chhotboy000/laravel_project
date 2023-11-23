@extends('layouts.layout')
@section('content')
<h1>Check Out</h1>
<br>
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
    <table class="table table-hover mx-auto">
      <thead>
        <th>ID</th>
        <th>Patient Name</th>
        <th>Service Price</th>
        <th>Medicine Price</th>
        <th>Total</th>
        <th>Action</th>
      </thead>
      <tbody>
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
          @endphp
          {{$total}}
        </td>
        <td>
          <form action="{{ url('admin/recept/confirm/' . $b->id) }}" method="post">
            @csrf
            @php
                $treat_id = App\Models\treatment::where('id', $b->id) ->value('id');
                $patient_id = App\Models\treatment::where('id', $b->id) ->value('patient_id');
            @endphp
            <input type="hidden" name="totalServicePrice" value="{{ $totalServicePrice }}">
            <input type="hidden" name="totalMedicinePrice" value="{{ $totalMedicinePrice }}">
            <input type="hidden" name="total" value="{{ $total }}">
            <input type="hidden" name="treatment_id" value="{{ $treat_id }}">
            <input type="hidden" name="patient_id" value="{{ $patient_id }}">
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
      </td>
    </tr>
      @endforeach
      </tbody>
    </table>
@endsection