<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{asset('../assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{asset('../assets/css/demo_1/style.css') }}" />
    <!-- endinject -->
  
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('../assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- container-scroller -->
    <script src="{{asset('../assets/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('../assets/vendors/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
                      <?php echo
                        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                        header("Cache-Control: post-check=0, pre-check=0", false);
                        header("Pragma: no-cache");
                        header('Content-Type: text/html');
                      ?>
  </head>
  <body>
    <div id="app">
            @yield('content')
        <!-- </main> -->
    </div>
    </body>
</html>
