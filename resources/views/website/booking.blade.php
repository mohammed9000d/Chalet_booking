
    @extends('website.parent')

    @section('nav-color', 'bg-primary')

    @section('content')

    <!-- HEADER -->

    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p> الرئيسية <i class="fas fa-chevron-left"></i> نتائج البحث <i class="fas fa-chevron-left"></i>{{ $chalet->name }} <i class="fas fa-chevron-left"></i> حجز</p>
                </div>
            </div>
        </div>
    </header>

    <!-- SHOWCASE -->
    <section id="showcase-book">
        <div class="container">
            <div class="content d-flex align-items-center justify-content-center flex-column text-center">
                <h3 class="pb-3">ملاحظات هامة</h3>
                <div class="d-flex mb-3">
                    <p class="lead">ادخل رقم هاتف صحيح حتى يتواصل معك مالك الشاليه لمساعدتك في عملية الدفع حتى تتم عملية الحجز بالكامل</p>
                    <i class="fas fa-star mt-2 d-lg-none"></i>
                </div>

                <div class="d-flex">
                    <p class="lead">عندما تحجز من هنا لا تتم عملية الحجز بالكامل ستكون قيد المتابعة حتى يتواصل معك المالك وتتفقون على طريقة الدفع</p>
                    <i class="fas fa-star mt-2 d-lg-none"></i>
                </div>


            </div>
            <div class="img d-none d-md-block">
                <img src="{{asset('chalets/website/dist/images/1617560435652.jpg')}}" alt="">
            </div>
        </div>
    </section>

    <!-- BOOKING -->

    <section id="booking" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            <div class="cover">
                <div class="space pb-5">
                    <div class="row bg-white">
                        <div class="col-lg-3"></div>
                        <div class="right profile col-lg-6 col-sm-12 py-5 text-right">

                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            @endforeach

                            @endif
                            @if (session()->has('alert-type'))
                            <div class="alert {{session()->get('alert-type')}} alert-dismissible fade show" role="alert">
                                {{session()->get('messege')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <h3 class="mb-3">ادخل التفاصيل لتتم عملية الحجز</h3>
                            <form action="{{ route('website.process',[$chalet->id]) }}" method="POST">
                                @csrf
                                <div id="num" class="form-group py-1">
                                    <label for="name"class="mb-3">الاسم الاول</label>
                                    <input type="text" class="form-control" value="{{ Auth()->user()->first_name }}">
                                </div>
                                <div class="form-group py-1">
                                    <label for="name"class="mb-3">الاسم الاخير</label>
                                    <input type="text" class="form-control" value="{{ Auth()->user()->last_name }}">
                                </div>
                                <div class="form-group py-1">
                                    <label for="name"class="mb-3">الايميل</label>
                                    <input type="email" class="form-control" value="{{ Auth()->user()->email }}">
                                </div>
                                <div class="form-group py-1">
                                    <label for="name"class="mb-3">الهاتف</label>
                                    <input type="text" class="form-control" value="{{ Auth()->user()->mobile }}">
                                </div>
                                <div class="form-group py-1">
                                    <label for="name"class="mb-3">تاريخ الحجز</label>
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="form-group">
                                    <label class="mb-3">توقيت الحجز</label>
                                    <select class="form-control" name="time">
                                        <option>-- Select --</option>
                                        <option>الفترة المسائية (من الساعة ال 8:00 م الى الساعة ال 7:00 ص)</option>
                                        <option>الفترة الصباحية (من الساعة ال 8:00 ص الى الساعة ال 7:00 م)</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-log mb-4 btn-block mt-4">حجز</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @endsection


    @section('scripts')
    <script src="{{asset('chalets/website/dist/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection
