<!DOCTYPE html>
<html dir="rtl" lang="ar" xml:lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/bootstrap.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Chalet4All</title>
    <style>

    </style>
</head>

<body>
    <section id="login">
        <div class="container">
            <div class="cover">
                <div class="space">
                    <div class="row bg-white">
                        <div class="right col-lg-6 col-sm-12 py-5 text-center">
                            <h3 class="mb-3">مرحبا بك</h3>
                            <p class="mb-3">قم بتسجيل الدخول عن طريق ادخال اليميل والباسوورد</p>
                            @if(session()->has('alert-type'))
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
                            <form action="{{ route('user.login') }}" method = "POST">
                                @csrf
                                <div class="form-group py-1">
                                    <input name="email" type="email" class="form-control" placeholder="الايميل">
                                </div>
                                <div class="form-group py-1">
                                    <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
                                </div>
                                <button class="btn btn-log btn-block mb-4 mt-2" type="submit">تسجيل الدخول</button>
                                <p class="mb-4">تسجيل الدخول باستخدام</p>
                                <div class="btn btn-outline-danger ml-2"><i class="fab fa-google"></i></div>
                                <a href="{{ route('login.facebook') }}"  class="btn btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                                {{-- <div class="btn btn-outline-primary" <i class="fab fa-facebook-f"></i></div> --}}
                                <p class="mt-5">لا تمتلك حساب ؟ <a href="{{route('user.register_view')}}">سجل من هنا</a></p>

                                {{-- <a class="btn btn-primary btn-block" href="{{ route('login.facebook') }}">Login With Facebook</a> --}}
                            </form>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block left"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>
