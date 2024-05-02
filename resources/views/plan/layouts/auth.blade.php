<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
           <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Daily Plan |  @yield('title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="admin/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div class="account-pages my-5 pt-sm-5">

            @yield('content')
        </div>
        <!-- end account-pages -->
        @include('sweetalert::alert')
        <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('admin/libs/parsleyjs/parsley.min.js') }}"></script>

        <script src="{{ asset('admin/js/pages/form-validation.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('admin/js/app.js') }}"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Feb 2021 08:02:10 GMT -->
</html>

