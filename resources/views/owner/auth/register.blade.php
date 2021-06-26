<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Owner - Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('chalets/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/style.css')}}">

    <script src="{{asset('chalets/admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('chalets/admin/assets/js/respond.min.js')}}"></script>

</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{asset('chalets/admin/assets/img/logo-white.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        @if (session()->has('alert-type'))
                        <div class="alert {{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif

                        <!-- Form -->
                        <form action="{{ route('owner.register') }}" method = "POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="last_name" value="{{ old('last_name') }}" type="text" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="mobile" value="{{ old('mobile') }}" type="tel" placeholder="Mobile">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" value="{{ old('email') }}" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password" value="{{ old('password') }}" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                {{--  <label class="col-form-label">City</label>  --}}
                                <select class="form-control" id="state_id" name="state_id">
                                    <option>-- Select Your State --</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{--  <div class="form-group">
                                <input class="form-control" name="birth_date" value="{{ old('birth_date') }}" type="date">
                            </div>  --}}
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Birth Date</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="birth_date" value="{{ old('birth_date') }}" type="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Your Image</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="image" type="file" accept="image/*">
                                    {{-- <input type="file" class="custom-file-input" name="author_image"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gender</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-2" type="radio" name="gender" id="gender_male" value="Male" checked>
                                        <label class="form-check-label mt-2" for="gender_male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input mt-2" type="radio" name="gender" id="gender_female" value="Female">
                                        <label class="form-check-label mt-2" for="gender_female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        {{--  <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i
                                    class="fa fa-google"></i></a>
                        </div>  --}}
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Already have an account? <a href="{{ route('owner.login_view') }}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('chalets/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('chalets/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('chalets/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('chalets/admin/assets/js/script.js')}}"></script>

</body>
</html>
