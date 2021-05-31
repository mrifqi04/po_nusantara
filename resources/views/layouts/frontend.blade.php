<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.frontend.head')
</head>

<body>

  <!-- ======= Top Bar ======= -->
    @include('partials.frontend.topbar')

  <!-- ======= Header ======= -->
    @include('partials.frontend.header')
  <!-- End Header -->

  

  @yield('content')  

  <!-- ======= Footer ======= -->
    @include('partials.frontend.footer')
  <!-- End Footer -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

  @yield('script')

</body>

</html>