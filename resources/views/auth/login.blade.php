<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Feb 2021 08:02:10 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Daily Activity Follow up-login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="admin/images/favicon.ico">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="admin/libs/owl.carousel/assets/owl.carousel.min.css">

        <link rel="stylesheet" href="admin/libs/owl.carousel/assets/owl.theme.default.min.css">

        <!-- Bootstrap Css -->
        <link href="admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="admin/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-75 flex-column">

                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">



                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4" ><i style="color:#141be0">
                                                                        @if($motivationr)
                                                                    {{$motivationr->randon()->qoute}}
                                                                    @endif
                                                                    </i></p>


                                                                </div>
                                                                 <h1 class="mb-3"><i class="bx bxs-quote-alt-right text-primary h1 align-middle me-3"></i><span class="text-primary"> <b>መልካም የተግባር ቀን </b> &nbsp;<i class="bx bxs-quote-alt-right text-primary h1 align-middle me-3"></i></h1>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5" style="margin-left:30%">
                                        <a href="#" target="_blank" class="d-block auth-logo">
                                           <img  src="{{ asset('admin/images/logo.jpg') }}" alt="" class="rounded-circle" height="100" width="100">
                                        </a>
                                    </div>
                                    <div class="my-auto">

                                        <div>
                                            <h5 class="text-primary">Login Here !</h5>

                                        </div>
                                        @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

                                        <div class="mt-4">
                                             <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                            @csrf
                <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Enter email" required="required" required autofocus>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                            </div>

                                             <div class="mb-3">
                                <label class="form-label">{{ __('Password') }}</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} " name="password" id="validationTooltip03" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    @if ($errors->has('password'))
                                    <div class="valid-tooltip">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>




                                            </form>
                                            <div class="mt-5 text-center">
                                      <p>© <script>document.write(new Date().getFullYear())</script> AII. All Rights Reserved </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
        @include('sweetalert::alert')
        <!-- JAVASCRIPT -->
        <script src="admin/libs/jquery/jquery.min.js"></script>
        <script src="admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="admin/libs/metismenu/metisMenu.min.js"></script>
        <script src="admin/libs/simplebar/simplebar.min.js"></script>
        <script src="admin/libs/node-waves/waves.min.js"></script>

        <!-- owl.carousel js -->
        <script src="admin/libs/owl.carousel/owl.carousel.min.js"></script>

        <!-- auth-2-carousel init -->
        <script src="admin/js/pages/auth-2-carousel.init.js"></script>

        <!-- App js -->
        <script src="admin/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Feb 2021 08:02:10 GMT -->
</html>
