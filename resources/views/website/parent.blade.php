<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('chalets/website/dist/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/bootstrap.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Chalet4All</title>
    @yield('links')

</head>

<body id="body">

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-md @yield('nav-color') navbar-dark fixed-top py-3">
        <div class="container">
            <a href="{{ route('website.index') }}" class="navbar-brand">
                <h3>
                    <img class="logo-image" src="{{ asset('chalets/website/dist/images/logo.png') }}">
                </h3>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto mr-3">
                    @yield('profile-1')
                    <li class="nav-item">
                        <a href="{{route('website.favorite')}}" class="nav-link @yield('active-4')">المفضلة</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.reservations')}}" class="nav-link @yield('active-3')">حجوزاتي</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.chalets')}}" class="nav-link @yield('active-2')">الشاليهات</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.index')}}" class="nav-link @yield('active-1')">الرئيسية</a>
                    </li>
                </ul>
                @yield('profile-2')
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->

    <footer id="main-footer" class="bg-primary text-white" dir="rtl" lang="ar" xml:lang="ar">
        <div class="footer-head card-header">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="#"><i class="fab fa-facebook-square fa-2x ml-2 text-white"></i></a>
                        <a href="#"><i class="fab fa-twitter-square fa-2x ml-2 text-white"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-2x text-white"></i></a>

                    </div>
                    <p class="lead">info &copy; chalet4all.com</p>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row py-4">
                <div class="col-md-6 py-4">
                    <a href="index.html" class="text-right">
                        <h3 class="text-white">Chalet4All</h3>
                    </a>
                    <ul class="nav nav-pills justify-content-start">
                        <li class="nav-item">
                            <a href="{{route('website.index')}}" class="text-white p-2">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.chalets')}}" class="text-white p-2">الشاليهات</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.reservations')}}" class="text-white p-2">حجوزاتي</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.favorite')}}" class="text-white p-2">المفضلة</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-right py-4">
                    <p class="mb-2">تلقى أخر التحديثات عن خدماتنا عبر البريد</p>
                    <div class="contact d-flex text-center justify-content-left">
                        <input type="text" class="form-control ml-2" placeholder="الايميل">
                        <a href="#" class="btn">ارسال</a>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="footer-bottom d-flex justify-content-between pb-5 pt-2">
                <p>كل الحقوق محفوظة في موقع شاليه للجميع</p>
                <ul class="nav nav-pills">
                    <li class="nav-item ml-3">دقة</li>
                    <li class="nav-item ml-3">سرعة</li>
                    <li class="nav-item ml-3">تميز</li>
                    <li class="nav-item ml-3">مراجعة</li>
                </ul>
            </div>
        </div>
    </footer>

    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>
