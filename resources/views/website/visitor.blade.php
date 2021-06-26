<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('chalets/website/dist/css/bootstrap.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--page-icon------------>
    <link rel="shortcut icon" href="{{asset('chalets/website/dist/images/logo.png')}}">
    <!--stylesheet------------->
    <link rel="stylesheet" type="text/css" href="{{asset('chalets/website/dist/css/style.css')}}">
    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="{{asset('chalets/website/dist/css/lightslider.css')}}">
    <!--Jquery-------------------->
    <script type="text/javascript" src="{{asset('chalets/website/dist/js/Jquery.js')}}"></script>
    <!--lightslider.js--------------->
    <script type="text/javascript" src="{{asset('chalets/website/dist/js/lightslider.js')}}"></script>
    <title>Chalet4All</title>
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
                    <li class="nav-item d-md-none ml-2">
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.favorite')}}" class="nav-link">المفضلة</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.reservations')}}" class="nav-link">حجوزاتي</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.chalets')}}" class="nav-link">الشاليهات</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('website.index')}}" class="nav-link active">الرئيسية</a>
                    </li>
                    <li style="margin-left: 2rem;">
                        <a href="{{route('user.login_view')}}" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> سجل/دخول</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


   <!-- SHOWCASE -->

 <section id="showcase" class="mb-5"  dir="rtl" lang="ar" xml:lang="ar">
     <div class="container">
         <div class="primary-overlay text-white d-flex flex-column justify-content-center align-items-center text-center">
             <h1 class="mb-4"> مرحبا بك <span>في شاليه للجميع</span></h1>

             <p class="lead">الصيف بدأ والعائلة تحتاج الى مكان للإستمتاع ابحث من خلال شريط اليحث على أكثر مكان مناسب لك ولعائلتك او اصدقائك</p>
             <form action="{{ route('website.search') }}" method="GET">
                 <div class="d-flex justify-content-center mb-4">
                     <input type="text" name="search">
                     <button type="submit" class="btn mr-2">ابحث الان</button>

                 </div>
             </form>
         </div>
     </div>
 </section>

 <!-- What we provide -->

 <section id="provide" class="py-5">
     <h3 class="text-center text-primary mb-4">ماذا نوفر لك</h3>
     <div class="container">
         <div class="boxes py-4">
             <div class="box">
                 <div class="card text-center bg-primary">
                     <div class="card-body">
                         <i class="fas fa-search fa-2x p-3"></i>
                         <p>بحث متقدم وذكى </p>
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="card text-center bg-orange">
                     <div class="card-body">
                         <i class="fas fa-thumbs-up fa-2x p-3"></i>
                         <p>تقييمات موثوقة</p>
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="card text-center bg-primary">
                     <div class="card-body">
                         <i class="fas fa-phone fa-2x p-3"></i>
                         <p>خدمة العملاء</p>
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="card text-center bg-orange">
                     <div class="card-body">
                         <i class="fab fa-cc-visa fa-2x p-3"></i>
                         <p>طرق دفع آمنة</p>
                     </div>
                 </div>
             </div>
             <div class="box">
                 <div class="card text-center bg-primary">
                     <div class="card-body">
                         <i class="fas fa-check fa-2x p-3"></i>
                         <p>حجز مؤكد ومضمون</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </section>

 <!-- TOPRATED: SLIDER BOX -->

 <section id="toprated" class="my-5">
     <div class="part-2">
         <div class="text-white text-right p-5">
             <h3>إحجز أفضل الأماكن العائلية الآن</h3>
             <p class="spacing">يمكنك الآن حجز أفضل الأماكن لك وللعائلة بأفضل الأسعار وهذه قائمة لك لأفضل وارقى الإمكان التي ستكون مصدر راحة لك ولعائلتك</p>
         </div>

         <div class="slider">
             <ul id="autoWidth" class="cs-hidden">
                 <!--1------------------------------------>
                 @foreach ($chalets as $chalet)
                 <li class="item-a">
                     <div class="box back-{{ $chalet->id }}">
                         <div class="overlay">
                             <div class="flex-boxes">
                                 <a href="{{route('website.details',[$chalet->id])}}" class="text-white">
                                     <p>{{ $chalet->name }}</p>
                                 </a>
                                 <div class="stars">
                                     <i class="fas fa-star"></i>
                                     <i class="fas fa-star"></i>
                                     <i class="fas fa-star"></i>
                                     <i class="fas fa-star"></i>
                                     <i class="fas fa-star"></i>
                                 </div>

                                 <p class="price">{{ $chalet->price }} <span>:سعر الحجز </span></p>
                                 <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-light mb-3">حجز الآن</a>
                             </div>
                         </div>
                     </div>
                 </li>
                 @endforeach
             </ul>
         </div>
     </div>
 </section>



 <!-- FEATUERS -->

 <section id="features" class="py-5">
     <h3 class="text-center text-primary mb-4">بماذا نتميز</h3>
     <div class="container">
         <div class="row">
             <div class="col text-center mb-2">
                 <div class="circle">
                     <i class="fas fa-wifi fa-3x"></i>
                 </div>
                 <p>الإنترنت</p>
             </div>
             <div class="col text-center mb-2">
                 <div class="circle">
                     <i class="fas fa-hand-holding-heart fa-3x"></i>
                 </div>

                 <p>خدمة مميزة</p>
             </div>
             <div class="col text-center mb-2">
                 <div class="circle">
                     <i class="fas fa-child fa-3x"></i>
                 </div>

                 <p>رعاية الأطفال</p>
             </div>
             <div class="col text-center mb-2">
                 <div class="circle">
                     <i class="far fa-calendar-check fa-3x"></i>
                 </div>

                 <p>دقة الحجز</p>
             </div>
             <div class="col text-center mb-2">
                 <div class="circle">
                     <i class="fas fa-tachometer-alt fa-3x"></i>
                 </div>

                 <p>سرعة العمل</p>
             </div>
         </div>
     </div>
 </section>

 <!-- Offers -->
 <section id="offers" class="py-5">
     <div class="container">
         <h3 class="text-center text-primary mb-4">الباقات والعروض</h3>
         <div class="items py-4">
             <div class="item item-1 card">
                 <div class="card-header bg-white">
                     <p class="lead">الباقة شاليه النهائية</p>
                 </div>

                 <div class="card-body">
                     <p>خصومات تصل الى 10%</p>
                     <p>حدمة الدفع المسبق فقط</p>
                     <p class="text-muted">الضيافة المجانية + وجبة غذاء</p>
                     <p class="text-muted">عناية تجميلية + رحلة مجانية</p>
                     <a href="#" class="btn">مجانية</a>
                 </div>
             </div>
             <div class="item item-2 card text-white">
                 <div class="card-header bg-primary">
                     <p class="lead">باقة شاليه+</p>
                 </div>

                 <div class="card-body">
                     <p>خصومات تصل الى 30%</p>
                     <p>خدمة الدفع عند الوصول</p>
                     <p>الضيافة المجانية</p>
                     <p>عناية شخصية وتجميلية</p>
                     <p>تنبيهات آخر العروض المتاحة</p>
                     <p>التوصيل من مكانك</p>
                     <p>خدمة العملاء</p>
                     <a href="#" class="btn btn-primary">200$ / month</a>
                 </div>
             </div>
             <div class="item item-3 card">
                 <div class="card-header bg-white">
                     <p class="lead">الباقة شاليه الشخصية</p>
                 </div>

                 <div class="card-body">
                     <p>خصومات تصل الى 50%</p>
                     <p>خدمة الدفع عند الوصول</p>
                     <p>الضيافة المجانية + وجبة غذاء</p>
                     <p>عناية تجميلية + رحلة مجانية</p>
                     <a href="#" class="btn">تواصل معنا</a>
                 </div>
             </div>
         </div>
     </div>

 </section>

 <!-- COMMENTS -->

 <section id="comments" class="py-5">
     <h3 class="text-center text-primary mb-4">أراء عملائنا بالخدمة</h3>
     <div class="items text-white py-4">
         <div class="img face-2"></div>
         <div class="item item-1 card p-4">
             <div class="right">
                 <i class="fas fa-quote-right"></i>
             </div>
             <div class="card-body">
                 <p>خدمة رائعة جدا يستحقون الف نجمة</p>
             </div>
             <div class="left">
                 <i class="fas fa-quote-left"></i>
             </div>

         </div>
         <div class="img face-1"></div>
         <div class="item item-2 card bg-primary p-4">
             <div class="right">
                 <i class="fas fa-quote-right"></i>
             </div>
             <div class="card-body">
                 <p>كلما ذكرت روعة التعامل ذكرتهم</p>
             </div>
             <div class="left">
                 <i class="fas fa-quote-left"></i>
             </div>
         </div>
         <div class="img face-3"></div>
         <div class="item item-3 card p-4">
             <div class="right">
                 <i class="fas fa-quote-right"></i>
             </div>
             <div class="card-body">
                 <p>موقع جميل جدا وسهل التعامل </p>
             </div>
             <div class="left">
                 <i class="fas fa-quote-left"></i>
             </div>
         </div>
     </div>
 </section>

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



 <script type="text/javascript" src="{{asset('chalets/website/dist/js/script.js')}}"></script>
 <script src="{{asset('chalets/website/dist/app.js')}}"></script>

</body>

</html>
