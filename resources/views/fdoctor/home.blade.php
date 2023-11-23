@extends('layouts.layout')
@section('title','dashboard')
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{url('product/index')}}">click here to start</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<style>
    .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
    border-spacing: 0;
}

/* Style for table headers */
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
    text-align: center;
}

/* Style for table cells */
.table tbody > tr > td {
    vertical-align: middle;
    text-align: center;
}

/* Style for schedule cells */
.schedule {
    padding: 10px;
}

/* Custom background colors for different roles */
.schedule div {
    padding: 5px;
    margin-bottom: 5px;
    border-radius: 5px;
}

/* Additional styles for specific background colors */
.schedule. div[style*="background-color:aliceblue"] {
    background-color: aliceblue;
    color: black;
}

.schedule. div[style*="background-color:rgb(73, 236, 95)"] {
    background-color: rgb(73, 236, 95);
    color: white;
}

.schedule. div[style*="background-color:rgb(226, 221, 82)"] {
    background-color: rgb(226, 221, 82);
    color: black;
}

.schedule. div[style*="background-color:rgb(237, 102, 102)"] {
    background-color: rgb(237, 102, 102);
    color: white;
}

/* Style for panel */
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.05);
}
</style>
<h2>Welcome {{$user->job}} - {{$user->name}}</h2>
    <div class="row" style="width: 100%">
        {{-- <div class="col-xs-6 col-sm-6">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">{{ $count }}</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Active Doctors </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">15</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Active Nurses </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">15</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Patients </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">15</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Pharmacists </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">15</span>
                        </h2>
                    </div>
                    <div class="items pull-left">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Receptionists </h4>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-m-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align:center">
                        <h2>Shift Plan</h2>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTableExample2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                    <th>Sun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="line-height: 25px; font-size:20px; vertical-align:middle;">07:00-15:00</td>
                                    @for ($i=1;$i<8;$i++)
                                    @php
                                        $day = 'd'.$i;
                                    @endphp
                                    <td class="schedule" style="line-height: 20px; font-size:15px;">
                                        @foreach ($sche as $sch)
                                            @if ($sch->day==$day)
                                                @if ($sch->time=="mor" && $sch->job=="doc")
                                                        <div style="background-color:aliceblue">doctor: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="mor" && $sch->job=="nur")
                                                        <div style="background-color:greenyellow">nurse: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="mor" && $sch->job=="rep")
                                                        <div style="background-color: rgb(226, 221, 82)">rec: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="mor" && $sch->job=="pha")
                                                        <div style="background-color: rgb(237, 102, 102)">phar: {{$sch->user->name}} </div><br>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td style="line-height: 25px; font-size:20px; vertical-align:middle;">15:00-23:00</td>
                                    @for ($i=1;$i<8;$i++)
                                    @php
                                        $day = 'd'.$i;
                                    @endphp
                                    <td class="schedule" style="line-height: 20px; font-size:15px;">
                                        @foreach ($sche as $sch)
                                            @if ($sch->day==$day)
                                                @if ($sch->time=="aft" && $sch->job=="doc")
                                                        <div style="background-color:aliceblue">doctor: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="aft" && $sch->job=="nur")
                                                        <div style="background-color:greenyellow">nurse: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="aft" && $sch->job=="rep")
                                                        <div style="background-color: rgb(226, 221, 82)">rec: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="aft" && $sch->job=="pha")
                                                        <div style="background-color: rgb(237, 102, 102)">phar: {{$sch->user->name}} </div><br>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    @endfor
                                </tr>
                                <tr>
                                    <td style="line-height: 25px; font-size:20px; vertical-align:middle;">23:00-07:00</td>
                                    @for ($i=1;$i<8;$i++)
                                    @php
                                        $day = 'd'.$i;
                                    @endphp
                                    <td class="schedule" style="line-height: 20px; font-size:15px;">
                                        @foreach ($sche as $sch)
                                            @if ($sch->day==$day)
                                                @if ($sch->time=="eve" && $sch->job=="doc")
                                                        <div style="background-color:aliceblue">doctor: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="eve" && $sch->job=="nur")
                                                        <div style="background-color:greenyellow">nurse: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="eve" && $sch->job=="rep")
                                                        <div style="background-color: rgb(226, 221, 82)">rec: {{$sch->user->name}} </div><br>
                                                @elseif ($sch->time=="eve" && $sch->job=="pha")
                                                        <div style="background-color: rgb(237, 102, 102)">phar: {{$sch->user->name}} </div><br>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align:center">
                        <h4>Event</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="embed-container">
                        <form action="">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                </thead>
                                <tbody>
                                    @foreach ($eve as $e)
                                    <tr>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$e->id}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$e->title}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$e->day}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$e->time}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title" style="text-align:center">
                        <h4>Task</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="embed-container">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Check</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($task as $t)
                                    @if ($t->user->job == $user->job)
                                    <tr style="border: thin">
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$t->id}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$t->title}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$t->day}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$t->time}}</td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;"><a href='{{ url("task/upd/$t->id") }}'>Check</a></td>
                                        <td style="line-height: 15px; font-size:15px; height: 20px;">{{$t->status}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <tr >
                                        <td style="font-size:15px; line-height: 10px; height:8px;">
                                            <button id="btntask" >Create task</button>
                                        </td>
                                        <td style="font-size:15px; line-height: 10px; height:8px;" colspan="5">
                                            <form id="taskform" method="POST" action="{{url('cretask')}}" style="display: none;">
                                                @csrf
                                                Title: <input type="text" name="ttitle" id="ttitle" style="width: 20%"><br>
                                                Day: <input type="text" name="tday" id="tday" style="width: 20%"><br>
                                                Time: <input type="text" name="ttime" id="ttime" style="width: 20%"><br> <br>
                                                <input type="submit">
                                                <input type="hidden" name="tuserid" id="tuserid" value="@if(isset($user->name)){{$user->id}} @endif">
                                            </form>
                                        </td>
                                    </tr>
                                    
                                        
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();
        let selectYear = document.getElementById("year");
        let selectMonth = document.getElementById("month");
        let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        let monthAndYear = document.getElementById("monthAndYear");
        showCalendar(currentMonth, currentYear);
        function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            showCalendar(currentMonth, currentYear);
        }
        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            showCalendar(currentMonth, currentYear);
        }
        function jump() {
            currentYear = parseInt(selectYear.value);
            currentMonth = parseInt(selectMonth.value);
            showCalendar(currentMonth, currentYear);
        }
        function showCalendar(month, year) {
            let firstDay = (new Date(year, month)).getDay();
            let daysInMonth = 32 - new Date(year, month, 32).getDate();
            let tbl = document.getElementById("calendar-body"); // body of the calendar
            // clearing all previous cells
            tbl.innerHTML = "";
            // filing data about month and in the page via DOM.
            monthAndYear.innerHTML = months[month] + " " + year;
            selectYear.value = year;
            selectMonth.value = month;
            // creating all cells
            let date = 1;
            for (let i = 0; i < 6; i++) {
                // creates a table row
                let row = document.createElement("tr");
                //creating individual cells, filing them up with data.
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        let cell = document.createElement("td");
                        let cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                        cell.style.lineHeight = "25px";
                        cell.style.height = "25px";
                    }
                    else if (date > daysInMonth) {
                        break;
                    }
                    else {
                        let cell = document.createElement("td");
                        cell.style.lineHeight = "25px";
                        cell.style.height = "25px";
                        let cellText = document.createTextNode(date);
                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.classList.add("bg-info");
                        } // color today's date
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                        date++;
                    }
                }
                tbl.appendChild(row); // appending each row into calendar body.
            }
        }
    </script>
    <script>
        const toggleButton = document.getElementById('btntask');
        const formContainer = document.getElementById('taskform');

        toggleButton.addEventListener('click', function() {
        if (formContainer.style.display === 'none') {
            formContainer.style.display = 'block';
        } else {
            formContainer.style.display = 'none';
        }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var tcount={{$taskcount}};
        $(document).ready(function() {
            for(i=0;i<tcount;i++){
                $('#myCheckbox' + i).click(function() {
                    if ($(this).prop('checked')) {
                    $('#status' + i).text('Done');
                    } else {
                    $('#status' + i).text('Not yet');
                    }
                });
            };
        });
    </script>
@endsection
