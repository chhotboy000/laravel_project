@extends('layouts.layout')
@section('title','List Product')
@section('content')
    <div class="row" style="width: 95%">
        <div class="col-xs-6 col-sm-6">
            <div class="panel panel-bd cardbox">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="count-number">15</span>
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
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>DataTables </h4>
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
                                    <td>07:00-15:00</td>
                                    {{-- @foreach ( as ) --}}
                                    <td class="schedule" style="line-height: 22px;">doctor: <br>doctor: <br>nurse: <br>nurse: <br>nurse: <br>rep: <br>phar: </td>
                                    {{-- @endforeach --}}
                                </tr>
                                <tr>
                                    <td>15:00-23:00</td>
                                    {{-- @foreach ( as ) --}}
                                    <td class="schedule" style="line-height: 22px;">doctor: <br>doctor: <br>nurse: <br>nurse: <br>nurse: <br>rep: <br>phar: </td>
                                    {{-- @endforeach --}}
                                </tr>
                                <tr>
                                    <td>23:00-07:00</td>
                                    {{-- @foreach ( as ) --}}
                                    <td class="schedule" style="line-height: 22px;">doctor: <br>doctor: <br>nurse: <br>nurse: <br>nurse: <br>rep: <br>phar: </td>
                                    {{-- @endforeach --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" >
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Calender</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- monthly calender -->
                    <div class="card">
                        <h3 class="card-header" id="monthAndYear"></h3>
                        <table class="table table-bordered table-responsive-sm" id="calendar">
                            <thead>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                            </thead>
                
                            <tbody id="calendar-body">
                
                            </tbody>
                        </table>
                
                        <div class="form-inline">
                
                            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>
                
                            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
                        </div>
                        <br/>
                        <form class="form-inline">
                            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                                <option value=0>Jan</option>
                                <option value=1>Feb</option>
                                <option value=2>Mar</option>
                                <option value=3>Apr</option>
                                <option value=4>May</option>
                                <option value=5>Jun</option>
                                <option value=6>Jul</option>
                                <option value=7>Aug</option>
                                <option value=8>Sep</option>
                                <option value=9>Oct</option>
                                <option value=10>Nov</option>
                                <option value=11>Dec</option>
                            </select>

                            <label for="year"></label>
                                <select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                                <option value=2024>2024</option>
                                <option value=2025>2025</option>
                                <option value=2026>2026</option>
                                <option value=2027>2027</option>
                                <option value=2028>2028</option>
                                <option value=2029>2029</option>
                                <option value=2030>2030</option>
                            </select>
                        </form>    
                    </div>
                </div>
                 <div id="map1" class="hidden-xs hidden-sm hidden-md hidden-lg"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Google Map</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="embed-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.455517310123!2d108.43429177461765!3d11.942931736596375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317113de9fbdf74d%3A0x36bc315e7a9a830b!2zQ2jhu6MgxJDDoCBM4bqhdA!5e0!3m2!1sen!2s!4v1696507098136!5m2!1sen!2s" width="90%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="border: solid; border-radius:5px; text-align:center; height: 200px; ">Event</div>
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
    const fileImage = document.querySelector('#image');
    const displayImage = document.querySelector('.input-group .show_image');
    const content_error_image = document.querySelector('.custom-file .invalid-feedback strong');
    const submit_create_goods = document.querySelector('.card-footer button');
    fileImage.addEventListener('change',function(){
        var image = fileImage.files[0];
        var error_image = document.querySelector(".custom-file .invalid-feedback");

        if(image != null && !image.type.startsWith("image/")){
            error_image.style.display = "block";
            content_error_image.innerHTML = "Đó không phải hình ảnh, mời bạn vui lòng chọn lại";
        } else if (image != null && image.size >2000000){
            error_image.style.display = "block";
            content_error_image.innerHTML = "Kích thước quá lớn bạn vui lòng chọn hình khác";
        } else{
            error_image.style.display = "none";
            content_error_image.innerHTML = "";
        }

        if(content_error_image.innerHTML != ""){
            submit_create_goods.disabled = true;
            displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
        } else{
            submit_create_goods.disabled = false;
            if(image !=null){
                var ImageURL = URL.createObjectURL(image);
                displayImage.innerHTML = " <img src='"+ ImageURL +"'  width='300px;' height='200px;'>";
            }
        }

        if(image == null){
            displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
        }
    });
</script>
@endsection