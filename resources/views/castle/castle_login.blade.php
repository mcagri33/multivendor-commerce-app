<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/castle/images/favicon-32x32.png')}}" type="image/png"/>
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/castle/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/castle/css/bootstrap-extended.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/castle/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/castle/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{asset('assets/castle/css/pace.min.css')}}" rel="stylesheet"/>

    <title>Login</title>
</head>

<body class="bg-login">

<!--start wrapper-->
<div class="wrapper">

    <!--start content-->
    <main class="authentication-content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4 mx-auto">
                    <div class="card shadow rounded-5 overflow-hidden">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title">Login</h5>
                            @include('castle.layouts.alert')
                            <p class="card-text mb-5"></p>
                            <form class="form-body" action="{{route('castle.login.post')}}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-envelope-fill"></i></div>
                                            <input type="email" class="form-control radius-30 ps-5" name="email"
                                                   id="email" placeholder="Email Address">
                                        </div>
                                        @error("password")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                                                    class="bi bi-lock-fill"></i></div>
                                            <input type="password" class="form-control radius-30 ps-5" name="password"
                                                   id="password" placeholder="Enter Password">
                                        </div>
                                        @error("password")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--end page main-->

</div>
<!--end wrapper-->


<!--plugins-->
<script src="{{asset('assets/castle/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/castle/js/pace.min.js')}}"></script>


</body>

</html>
