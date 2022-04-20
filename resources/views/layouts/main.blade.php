<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Full calendar -->
    <link href="{{ asset('assets/fullcalendar/core/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/daygrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/timegrid/main.css') }}" rel='stylesheet' />
    <link href="{{ asset('assets/fullcalendar/list/main.css') }}" rel='stylesheet' />

    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
    {{-- Remix Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/fonts/remixicons/remixicon.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    <!-- loader Start -->
    {{-- <div id="loading">
         <div id="loading-center">

         </div>
      </div> --}}
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="index-2.html">
                    <img src="images/logo.png" class="img-fluid" alt="">
                    <span>{{ config('app.name') }}</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-more-fill"></i></div>
                            <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        @if (Auth::user()->role==1)
                        <li>
                            <a href="{{ route('index') }}" class="iq-waves-effect"><i
                                    class="ri-dashboard-line"></i><span>Dashboard</span></a>
                        </li>
                        {{-- OPD --}}
                        <li>
                            <a href="{{ route('opd.index') }}" class="iq-waves-effect"><i
                                    class="ri-hospital-line"></i><span>OPD</span></a>
                        </li>
                        {{-- Disease --}}
                        <li>
                            <a href="{{ route('disease.index') }}" class="iq-waves-effect"><i
                                    class="ri-virus-line"></i><span>Diseases</span></a>
                        </li>
                        {{-- Medicine --}}
                        <li>
                            <a href="{{ route('medicine.index') }}" class="iq-waves-effect"><i
                                    class="ri-capsule-line"></i><span>Medicines</span></a>
                        </li>
                        {{-- Test --}}
                        <li>
                            <a href="{{ route('test.index') }}" class="iq-waves-effect"><i
                                    class="ri-test-tube-line"></i><span>Tests</span></a>
                        </li>
                        {{-- Doctors --}}
                        <li>
                            <a href="{{ route('doctor.index') }}" class="iq-waves-effect"><i
                                    class="ri-nurse-line"></i><span>Doctors</span></a>
                        </li>
                        {{-- Patients Checkup --}}
                        <li>
                            <a href="{{ route('patient.index') }}" class="iq-waves-effect"><i
                                    class="ri-user-4-line"></i><span>Patients</span></a>
                        </li>
                        {{-- Patient Checkup --}}
                        <li>
                            <a href="{{ route('patient.checkup') }}" class="iq-waves-effect"><i
                                    class="ri-wheelchair-line"></i><span>Patient Checkup</span></a>
                        </li>
                        {{-- Receive Payment --}}
                        <li>
                            <a href="{{ route('payment.index') }}" class="iq-waves-effect"><i class="ri-bank-card-line"></i><span>Receive
                                    Payment</span></a>
                        </li>
                        {{-- Dealers --}}
                        <li>
                            <a href="{{ route('dealers.index') }}" class="iq-waves-effect"><i
                                    class="ri-user-line"></i><span>Dealers</span></a>
                        </li>
                        {{-- Purchase --}}
                        <li>
                            <a href="{{ route('purchase.index') }}" class="iq-waves-effect"><i
                                    class="ri-archive-line"></i><span>Purchase</span></a>
                        </li>
                        {{-- DM Relations --}}
                        <li>
                            <a href="{{ route('dmrelations.index') }}" class="iq-waves-effect"><i
                                    class="ri-medicine-bottle-line"></i><span>DM Relations</span></a>
                        </li>
                        {{-- Reports --}}
                        <li>
                            <a href="{{ route('reports.index') }}" class="iq-waves-effect"><i
                                    class="ri-table-line"></i><span>Reports</span></a>
                        </li>
                        @endif
                        @if (Auth::user()->role==2)
                        {{-- Dashboard --}}
                        <li>
                            <a href="{{ route('index') }}" class="iq-waves-effect"><i
                                    class="ri-dashboard-line"></i><span>Dashboard</span></a>
                        </li>
                        {{-- Patients --}}
                         <li>
                            <a href="{{ route('patient.index') }}" class="iq-waves-effect"><i
                                    class="ri-user-4-line"></i><span>Patients</span></a>
                        </li>
                        {{-- Patient Checkup --}}
                        <li>
                            <a href="{{ route('patient.checkup') }}" class="iq-waves-effect"><i
                                    class="ri-wheelchair-line"></i><span>Patient Checkup</span></a>
                        </li>
                         {{-- Reports --}}
                        <li>
                            <a href="{{ route('reports.index') }}" class="iq-waves-effect"><i
                                    class="ri-table-line"></i><span>Reports</span></a>
                        </li>
                        @endif
                        @if (Auth::user()->role==6)
                        {{-- Dashboard --}}
                        <li>
                            <a href="{{ route('index') }}" class="iq-waves-effect"><i
                                    class="ri-dashboard-line"></i><span>Dashboard</span></a>
                        </li>
                        {{-- Patients --}}
                         <li>
                            <a href="{{ route('patient.index') }}" class="iq-waves-effect"><i
                                    class="ri-user-4-line"></i><span>Patients</span></a>
                        </li>
                        {{-- Receive Payment --}}
                        <li>
                            <a href="{{ route('payment.index') }}" class="iq-waves-effect"><i class="ri-bank-card-line"></i><span>Receive
                                    Payment</span></a>
                        </li>
                        @endif
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                    <div class="iq-sidebar-logo">
                        <div class="top-logo">
                            <a href="index-2.html" class="logo">
                                <img src="images/logo.png" class="img-fluid" alt="">
                                <span>{{ config('app.name') }}</span>
                            </a>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="ml-3">
                            <h4>{{ $title }}</h4>
                        </div>
                        {{-- <div class="iq-search-bar">
                            <form action="#" class="searchbox">
                                <input type="text" class="text search-input" placeholder="Jump to a patient">
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            </form>
                        </div> --}}
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="iq-menu-bt align-self-center">
                            <div class="wrapper-menu">
                                <div class="main-circle"><i class="ri-more-fill"></i></div>
                                <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        </div>
                        <ul class="navbar-list">
                            <li>
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="{{ asset('assets/images/user/1.jpg') }}" class="img-fluid rounded mr-3"
                                        alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height">{{ Auth::user()->name }}</h6>
                                        <span class="font-size-12">Available</span>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white line-height">Hello {{ Auth::user()->name }}
                                                </h5>
                                                <span class="text-white font-size-12">Available</span>
                                            </div>
                                            <a href="{{ route('utility.profile.update') }}"
                                                class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-user-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">My Profile</h6>
                                                        <p class="mb-0 font-size-12">Edit personal profile details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            @if (Auth::user()->role==1)
                                            <a href="{{ route('utility.add.user') }}"
                                                class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-user-add-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Users</h6>
                                                        <p class="mb-0 font-size-12">Add and edit users.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif
                                            <a href="{{ route('utility.change.password') }}"
                                                class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-shield-keyhole-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">Change Password</h6>
                                                        <p class="mb-0 font-size-12">Change your account password.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-inline-block w-100 text-center p-3">
                                                <a class="bg-primary iq-sign-btn" href="{{ route('account.logout') }}"
                                                    role="button">Logout<i class="ri-login-box-line ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
            <!-- TOP Nav Bar END -->
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">{{ $title }}</h4>
            </div>
        </div>
    </div>
    </div>
    </div> --}}
    @yield('content')
    </div>
    <!-- Footer -->
    <footer class="bg-white iq-footer mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright {{ now()->year }} <a href="#">{{ config('app.name') }}</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    </div>
    </div>
    <!-- Wrapper END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('assets/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('assets/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('assets/js/kelly.js') }}"></script>
    <!-- Flatpicker Js -->
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @yield('js')
    @livewireScripts
</body>

</html>
