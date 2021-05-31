<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Login : Crudder Laravel APP Builder </title>
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('/favicon.png')}}" />

    <!-- vendor css -->
    <link href="{{asset('vendor/login')}}/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('vendor/login')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.css">
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.dark.css">
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('vendor/sweetalert')}}/sweetalert.css">
  <!-- End SweetAlert2 -->
</head>

<body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
        <img src="{{asset('vendor/login')}}/img/geek.png" class="wd-100p ht-100p object-fit-cover" alt="">
        <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
                <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Crud<span
                        class="tx-info">der</span>
                    <span class="tx-normal">]</span></div>
                <div class="tx-white-5 tx-center mg-b-60">Please Login To Use Crudder Laravel APP Builder</div>
                <form action="/admin/store-admin-login" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="email" class="form-control fc-outline-dark" placeholder="Enter your username">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" name="password" class="form-control fc-outline-dark" placeholder="Enter your password">
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-info btn-block">Sign Inn</button>
                </form>
            </div><!-- login-wrapper -->
        </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{asset('vendor/login')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('vendor/login')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('vendor/login')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('vendor/sweetalert')}}/sweetalert.min.js"></script>
    @include('vendor.sweet.alert')
</body>

</html>
