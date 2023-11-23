@extends('layouts.layout')
@section('title','Create Schedule')
@section('content')    
<style>
body {
    font-family: Arial, sans-serif;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

/* Style the select elements */
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

/* Optional: Style the submit button */
input[type="submit"] {
    width: 150px;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
    <div>
        <form action='{{url("/admin/schedule/postSche")}}' method="POST">
            @csrf
            <table>
                <thead>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </thead>
                <tbody>
                    @php
                        global $schid;
                        $schid=1;
                    @endphp
                    <tr>
                        <td><input type="submit"></td>
                        {{-- <td><a href="">edit</a></td> --}}
                    </tr>
                    <tr>
                        <td>07:00-15:00</td>
                        @for($i=1;$i<8;$i++)
                        <td style="line-height: 22px;">
                            <select name="s1id{{$i}}" id="">
                                @foreach ( $staff as $s)
                                    @if($s->role=='2')
                                        <option value="{{$s -> id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s1day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s1time{{$i}}" value="mor">
                            <input type="hidden" name="s1job{{$i}}" value="doc">
                            <input type="hidden" name="s1scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s2id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='2')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s2day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s2time{{$i}}" value="mor">
                            <input type="hidden" name="s2job{{$i}}" value="doc">
                            <input type="hidden" name="s2scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s3id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s3day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s3time{{$i}}" value="mor">
                            <input type="hidden" name="s3job{{$i}}" value="nur">
                            <input type="hidden" name="s3scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s4id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s4day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s4time{{$i}}" value="mor">
                            <input type="hidden" name="s4job{{$i}}" value="nur">
                            <input type="hidden" name="s4scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s5id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s5day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s5time{{$i}}" value="mor">
                            <input type="hidden" name="s5job{{$i}}" value="nur">
                            <input type="hidden" name="s5scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s6id{{$i}}" id="">
                                @foreach ( $staff as $s)
                                    @if($s->role=='4')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s6day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s6time{{$i}}" value="mor">
                            <input type="hidden" name="s6job{{$i}}" value="rep">
                            <input type="hidden" name="s6scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="s7id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='5')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="s7day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="s7time{{$i}}" value="mor">
                            <input type="hidden" name="s7job{{$i}}" value="pha">
                            <input type="hidden" name="s7scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp">
                        </td>
                        @endfor
                    </tr>
                    <tr>
                        <td>15:00-23:00</td>
                        @for($i=1;$i<8;$i++)
                        <td style="line-height: 22px;">
                            <select name="t1id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='2')
                                        <option value="{{$s -> id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t1day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t1time{{$i}}" value="aft">
                            <input type="hidden" name="t1job{{$i}}" value="doc">
                            <input type="hidden" name="t1scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t2id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='2')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t2day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t2time{{$i}}" value="aft">
                            <input type="hidden" name="t2job{{$i}}" value="doc">
                            <input type="hidden" name="t2scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t3id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t3day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t3time{{$i}}" value="aft">
                            <input type="hidden" name="t3job{{$i}}" value="nur">
                            <input type="hidden" name="t3scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t4id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t4day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t4time{{$i}}" value="aft">
                            <input type="hidden" name="t4job{{$i}}" value="nur">
                            <input type="hidden" name="t4scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t5id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t5day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t5time{{$i}}" value="aft">
                            <input type="hidden" name="t5job{{$i}}" value="nur">
                            <input type="hidden" name="t5scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t6id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='4')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t6day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t6time{{$i}}" value="aft">
                            <input type="hidden" name="t6job{{$i}}" value="rep">
                            <input type="hidden" name="t6scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="t7id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='5')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="t7day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="t7time{{$i}}" value="aft">
                            <input type="hidden" name="t7job{{$i}}" value="pha">
                            <input type="hidden" name="t7scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp">
                        </td>
                        @endfor
                    </tr>
                    <tr>
                        <td>23:00-07:00</td>
                        @for($i=1;$i<8;$i++)
                        <td style="line-height: 22px;">
                            <select name="c1id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='2')
                                        <option value="{{$s -> id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c1day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c1time{{$i}}" value="eve">
                            <input type="hidden" name="c1job{{$i}}" value="doc">
                            <input type="hidden" name="c1scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c2id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='2')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c2day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c2time{{$i}}" value="eve">
                            <input type="hidden" name="c2job{{$i}}" value="doc">
                            <input type="hidden" name="c2scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c3id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c3day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c3time{{$i}}" value="eve">
                            <input type="hidden" name="c3job{{$i}}" value="nur">
                            <input type="hidden" name="c3scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c4id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c4day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c4time{{$i}}" value="eve">
                            <input type="hidden" name="c4job{{$i}}" value="nur">
                            <input type="hidden" name="c4scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c5id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='3')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c5day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c5time{{$i}}" value="eve">
                            <input type="hidden" name="c5job{{$i}}" value="nur">
                            <input type="hidden" name="c5scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c6id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='4')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c6day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c6time{{$i}}" value="eve">
                            <input type="hidden" name="c6job{{$i}}" value="rep">
                            <input type="hidden" name="c6scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp"><br>
                            <select name="c7id{{$i}}" id="">
                                @foreach ( $staff as  $s)
                                    @if($s->role=='5')
                                        <option value="{{$s->id}}">{{$s -> name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="c7day{{$i}}" value="d{{$i}}">
                            <input type="hidden" name="c7time{{$i}}" value="eve">
                            <input type="hidden" name="c7job{{$i}}" value="pha">
                            <input type="hidden" name="c7scheid{{$i}}" value="@php $sid='sche'.$schid; echo $sid; $schid++; @endphp">
                        </td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    @php
        $schid=1;
    @endphp
@endsection
@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
