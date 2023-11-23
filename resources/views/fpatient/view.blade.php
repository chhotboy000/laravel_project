
<!DOCTYPE html>
<html lang="en">
<head>

     <title>TuTam</title>
<!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link rel="stylesheet" href="{{asset('css_index/bootstrap.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css_index/animate.css')}}">
<link rel="stylesheet" href="{{asset('css_index/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('css_index/owl.theme.default.min.css')}}">
{{-- Main css --}}
<link rel="stylesheet" href="{{asset('css_index/tooplate-style.css')}}">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome to a Professional Health Care</p>
                    </div>
                         
                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 010-060-0160</span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Mon-Fri)</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
                    <!-- lOGO TEXT HERE -->
                    <a href="/fpatient/index" class="navbar-brand">TuTam Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="{{url('fpatient/view')}}" class="smoothScroll">History</a></li>
                         <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                         

                         {{-- <li class="appointment-btn"><a href="{{url('login')}}">Login</a></li> --}}
                    </ul>
               </div>

          </div>
     </section>
<!-- History -->

     <!-- NEWS -->
     <section id="history">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>History </h2>
                         </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12">
                        <div id="1" style="display: block;">
                          <table class="table table-hover">
                            <thead>
                                <tr>
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
                            </tbody>
                          </table>
                        </div>
                   </div>
               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p><i class="fa fa-envelope"></i> <a href="#">info@company.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="{{asset('images_index/news-image.jpg')}}" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>Amazing Technology</h5></a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="{{asset('images_index/news-image.jpg')}}" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#"><h5>New Healing Process</h5></a>
                                        <span>February 20, 2018</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="#" class="fab fa-facebook"></a></li>
                                   <li><a href="#" class="fab fa-twitter"></a></li>
                                   <li><a href="#" class="fab fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2023 Your Company 
                                   
                                   | Design: <a href="http://www.tooplate.com" target="_parent">Tooplate</a></p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link"> 
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>
<script src="{{asset('js_index/jquery.js')}}"></script>
<script src="{{asset('js_index/bootstrap.min.js')}}"></script>
<script src="{{asset('js_index/jquery.sticky.js')}}"></script>
<script src="{{asset('js_index/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js_index/wow.min.js')}}"></script>
<script src="{{asset('js_index/smoothscroll.js')}}"></script>
<script src="{{asset('js_index/owl.carousel.min.js')}}"></script>
<script src="{{asset('js_index/custom.js')}}"></script>

</body>
</html>









