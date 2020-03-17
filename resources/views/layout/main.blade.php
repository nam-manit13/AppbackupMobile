<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/css/animate.css" type="text/css">
        
        <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css" type="text/css">
        <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">

        <link rel="stylesheet" href="/css/aos.css" type="text/css">

        <link rel="stylesheet" href="/css/ionicons.min.css" type="text/css">
        
        <link rel="stylesheet" href="/css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="/css/icomoon.css" type="text/css">
        <link rel="stylesheet" href="/css/style.css" type="text/css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
        </style>

<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
 
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBlgB3Up0iQSHwjjeKKv4fVS5nbjeCjHvM",
        authDomain: "fir-db-8d065.firebaseapp.com",
        databaseURL: "https://fir-db-8d065.firebaseio.com",
        projectId: "fir-db-8d065",
        storageBucket: "fir-db-8d065.appspot.com",
        messagingSenderId: "417540815548",
        appId: "1:417540815548:web:6eb2526ba2cc39a68f2eb9",
        measurementId: "G-QZQXP66PJW"
    };
   
    firebase.initializeApp(firebaseConfig);
    var db = firebase.firestore();
    </script>
    @yield('headd');
    </head>
    
    <body>
        <header id="header" class="fixed-top">
            <div class="container">
                <div class="bs-example">
                    <nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                        <div class="container">
                          <a class="navbar-brand" href="/">มหาวิทยาลัยเกษตรศาสตร์ <span>Kasetsart University.</span></a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="oi oi-menu"></span> เมนู
                          </button>
                
                          <div class="collapse navbar-collapse" id="ftco-nav">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item"><a href="/" class="nav-link">หน้าหลัก</a></li>
                              <li class="nav-item dropdown"><a href="#" class="nav-link">จัดการข้อมูลผู้ใช้ <i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li><a href="adduser" class="dropdown-item"> เพิ่มบัญชีผู้ใช้</a></li>
                                  <li><a href="deleteuser" class="dropdown-item"> จัดการบัญชี</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown"><a href="#" class="nav-link">รายงาน <i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li><a href="showbintype" class="dropdown-item"> ข้อมูลปริมาณขยะแต่ละประเภท</a></li>
                                  <li><a href="showbincycle" class="dropdown-item"> ข้อมูลขยะรีไซเคิล</a></li>
                                  <li><a href="showbintime" class="dropdown-item"> ข้อมูลขยะตามช่วงเวลา</a></li>
                                  <li><a href="reportbin" class="dropdown-item"> ดาวน์โหลดรายงาน</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown"><a href="#" class="nav-link">จัดการถังขยะ <i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                  <li><a href="addbin" class="dropdown-item"> เพิ่มถังขยะ</a></li>
                                  <li><a href="settingbin" class="dropdown-item"> ตั้งค่าการทำงานถังขยะ</a></li>
                                  {{-- <li><a href="#" class="dropdown-item"> ข้อมูลขยะตามช่วงเวลา</a></li>
                                  <li><a href="#" class="dropdown-item"> ดาวน์โหลดรายงาน</a></li> --}}
                                </ul>
                              </li>
                              {{-- <li class="nav-item"><a href="attorneys.html" class="nav-link">รายงาน</a></li> --}}
                              {{-- <li class="nav-item"><a href="practice-areas.html" class="nav-link">ตั้งค่าการทำงานถังขยะ</a></li> --}}
                              {{-- <li class="nav-item"><a href="case.html" class="nav-link">Case Studies</a></li>
                              <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> --}}
                              <li class="nav-item cta"><a href="login" class="nav-link">ออกจากระบบ</a></li>
                              {{-- <li class="nav-item cta"><a href="#" class="nav-link">Free Consultation</a></li> --}}
                            </ul>
                          </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @yield('content');
        {{-- @include('footer'); --}}
        @include('layout.footer')
        
    
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ URL::to('/js/jquery.min.js') }}"></script>
  <script src="{{ URL::to('/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ URL::to('/js/popper.min.js') }}"></script>
  <script src="{{ URL::to('/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::to('/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ URL::to('/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::to('/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ URL::to('/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::to('/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::to('/js/aos.js') }}"></script>
  <script src="{{ URL::to('/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ URL::to('/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ URL::to('/js/google-map.js') }}"></script>
  <script src="{{ URL::to('/js/main.js') }}"></script>
  
  </body>
</html>