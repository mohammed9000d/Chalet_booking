   @extends('website.parent')

   @section('active-1', 'active')

   @section('links')
    <!--stylesheet------------->
    <link rel="stylesheet" type="text/css" href="{{asset('chalets/website/dist/css/style.css')}}">
    <!--light-slider.css------------->
    <link rel="stylesheet" type="text/css" href="{{asset('chalets/website/dist/css/lightslider.css')}}">
    <!--Jquery-------------------->
    <script type="text/javascript" src="{{asset('chalets/website/dist/js/Jquery.js')}}"></script>
    <!--lightslider.js--------------->
    <script type="text/javascript" src="{{asset('chalets/website/dist/js/lightslider.js')}}"></script>
   @endsection

   @section('profile-1')
    <li class="nav-item d-md-none ml-2">
        <a href="{{route('website.profile')}}">
            <img class="profile-image" src="{{url('images/user/'.Auth()->user()->image)}}">
        </a>
    </li>
   @endsection
   @section('profile-2')
     <a href="{{route('website.profile')}}" class="d-none d-md-block">
        <img class="profile-image" src="{{url('images/user/'.Auth()->user()->image)}}">
     </a>
   @endsection
    @section('content')

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


    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{asset('chalets/website/dist/js/script.js')}}"></script>
    <script src="{{asset('chalets/website/dist/app.js')}}"></script>
    @endsection
