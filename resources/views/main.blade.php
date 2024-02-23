<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{asset('../assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{asset('../assets/css/demo_1/style.css') }}" />
    
    <!-- endinject -->

    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/select/1.4.0/css/select.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{asset('../assets/brand_datatable/jquery.dataTables.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Poppins:ital,wght@0,800;0,900;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="{{asset('../assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- container-scroller -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('../assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <link href="{{asset('../assets/brand_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('../assets/brand_datatable/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/brand_datatable/buttons.dataTables.min.css') }}">
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/buttons.flash.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('../assets/brand_datatable/buttons.colVis.min.js') }}"></script>
    
</head>

<body>
    <div class="container-scroller">
        <?php echo
                    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                    header("Cache-Control: post-check=0, pre-check=0", false);
                    header("Pragma: no-cache");
                    header('Content-Type: text/html');
        ?>

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item pt-3">
                    <a class="nav-link d-block" href="{{ url('/') }}">
                        <img class="sidebar-brand-logo" src="../assets/images/logo.svg" alt="" />
                        <img class="sidebar-brand-logomini" src="../assets/images/logo-mini.svg" alt="" />
                        <div class="small font-weight-light pt-1"> Dashboard</div>
                    </a>
                </li>
                <li class="pt-2 pb-1">
                    <span class="nav-item-head">Template Pages</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="mdi mdi-animation menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/AddTask') }}">
                        <i class="mdi mdi-animation menu-icon"></i>
                        <span class="menu-title">Add Task</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/Task') }}">
                        <i class="mdi mdi-animation menu-icon"></i>
                        <span class="menu-title">All Task</span>
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a class="nav-link text-danger" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title text-danger">LogOut</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
                style="left: 260px !important">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-chevron-double-left"></span>
                    </button>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="#"><img src="../assets/images/logo-mini.svg"
                                alt="logo" /></a>
                    </div>
                    <ul class="navbar-nav">
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-logout d-none d-lg-block">
                            <a class="nav-link" href="{{url('/')}}">
                                <i class="mdi mdi-home-circle"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu">
                        </span>
                    </button>
                </div>
            </nav>
            
            @yield('content')
            <!-- /footer content -->
            <script src="{{asset('../assets/js/off-canvas.js')}}"></script>
            <script src="{{asset('../assets/js/hoverable-collapse.js')}}"></script>
            <script src="{{asset('../assets/js/misc.js')}}"></script>
            <script src="{{asset('../assets/js/settings.js')}}"></script>
            <script src="{{asset('../assets/js/todolist.js')}}"></script>
            <script type="text/javascript">
            const secondHand = document.querySelector('.second-hand');
            const minsHand = document.querySelector('.min-hand');
            const hourHand = document.querySelector('.hour-hand');
            function setDate() {
                const now = new Date();
                const seconds = now.getSeconds();
                const secondsDegrees = ((seconds / 60) * 360) + 90;
                secondHand.style.transform = `rotate(${secondsDegrees}deg)`;


                const mins = now.getMinutes();
                const minsDegrees = ((mins / 60) * 360) + ((seconds / 60) * 6) + 90;
                minsHand.style.transform = `rotate(${minsDegrees}deg)`;

                const hour = now.getHours();
                const hourDegrees = ((hour / 12) * 360) + ((mins / 60) * 30) + 90;
                hourHand.style.transform = `rotate(${hourDegrees}deg)`;

            }

            setInterval(setDate, 1000);
            setDate();
            </script>
            <script src="{{asset('../assets/js/dashboard.js')}}"></script>
            <!-- End custom js for this page -->
</body>

</html>