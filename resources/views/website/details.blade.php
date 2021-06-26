    @extends('website.parent')

    @section('nav-color', 'bg-primary')

    @section('content')

    <style>
        .error {
            color: red;
        }
    </style>

    <!-- HEADER -->

    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> نتائج البحث <i class="fas fa-chevron-left"></i>{{ $chalet->name }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- SLIDER -->

    <div class="container mt-5">
        <div class="row slider-images">
            <div class="col-sm-12 m-auto">
                <div id="slider3" class="carousel slide mb-5" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#slider3" data-slide-to="0"></li>
                        <li data-target="#slider3" data-slide-to="1"></li>
                        <li data-target="#slider3" data-slide-to="2"></li>
                        <li data-target="#slider3" data-slide-to="3"></li>
                        <li data-target="#slider3" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{asset('chalets/website/dist/images/147885165_3690411804413764_5667505982365624824_n.jpg')}}" alt="First Slider">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('chalets/website/dist/images/121778552_3384174131704201_8494428272510508395_n.jpg')}}" alt="Secound Slider">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('chalets/website/dist/images/127791023_3492803464174600_3827596480759895421_n.jpg')}}" alt="Third Slider">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('chalets/website/dist/images/126288798_3474975179290762_481847176206897901_n.jpg')}}" alt="Four Slider">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('chalets/website/dist/images/120134045_3320463314741950_3033146927499492343_n (1).jpg')}}" alt="Five Slider">
                        </div>
                    </div>

                    <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a href="#slider3" class="carousel-control-next" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT -->

    <section id="detailes" class="mb-5" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7 text-right">
                    <div class="d-head text-muted mb-5">
                        <p>{{ $chalet->name }}</p>
                        <p><i class="fas fa-map-marker-alt"></i>{{ $chalet->address }}</p>
                        <p><i class="fas fa-star text-warning"></i> {{ number_format($avg_rated, 1) }} تقييم(15)</p>
                        <p><i class="fas fa-ruler-combined"></i> مساحة الوحدة {{ $chalet->chalet_space }} م</p>
                        <p><i class="fas fa-people-carry"></i> مخصص للعائلات والافراد وجميع المناسبات</p>
                    </div>
                    <div class="d-body">
                        <h4>وصف الشاليه</h4>
                        <p>{{ $chalet->description }}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bad">
                        <div class="calendar">
                            <div class="month">
                                <i class="fas fa-angle-left prev"></i>
                                <div class="date">
                                    <h1></h1>
                                    <p></p>
                                </div>
                                <i class="fas fa-angle-right next"></i>
                            </div>
                            <div class="weekdays">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="days"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-7 right">
                    <div class="card card-sec p-4">
                        <div class="head d-flex justify-content-around align-items-center text-center">
                            <a class="active" href="#المواصفات" id="adv">التقييمات</a>
                            <a href="#التقييمات" id="com">المواصفات</a>
                        </div>
                        <div class="content text-right">
                            <!-- Features -->
                            <div id="featuers">
                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        أماكن الجلوس
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-1"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-1">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">{{ $chalet->seating_places }}</p>
                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        المسابح
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-2"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-2">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">{{ $chalet->swimming_pools }}</p>
                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        المرافق
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-3"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-3">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">
                                                {{ $chalet->accompanying }}
                                            </p>
                                            <p></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        دورات المياه
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-4"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-4">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">
                                                {{ $chalet->washrooms }}
                                            </p>

                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        مرافق المطبخ
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-5"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-5">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">
                                                {{ $chalet->kitchen_facilities }}
                                            </p>

                                        </div>
                                    </div>

                                </div>


                                <div class="item">
                                    <div class="d-flex justify-content-between">
                                        غرف النوم
                                        <a href="#المواصفات" data-toggle="collapse" data-target="#btn-collapse-6"><i class="fas fa-chevron-down"></i></a>
                                    </div>
                                    <div class="collapse" id="btn-collapse-6">
                                        <div class="cont text-muted p-3">
                                            <p class="ml-4">
                                                {{ $chalet->bedrooms }}
                                            </p>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Rated And Comments -->

                            <div id="rated">
                                @foreach($comments as $comment)

                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="image">
                                                <img src="{{url('images/user/'.$comment->user->image) }}">
                                            </div>
                                            <div class="comment">
                                                <p>{{ $comment->user->first_name.' '.$comment->user->last_name }}</p>
                                                <p class="text-muted">{{ $comment->created_at }}</p>
                                                {{-- <p>
                                                    <i class="fas fa-star"></i> {{ $comment->rated }}
                                                </p> --}}
                                                <p class="text-muted">{{ $comment->rated }} <i class="fas fa-star text-warning ml-3"></i>{{ $comment->comment }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


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

                                <div class="card">
                                    <div class="p-4">
                                        <div id="errorMsg"></div>
                                        <form method="POST" id="comment"
                                        enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group text-center text-muted">
                                                <label for="comment" class="text-center mb-2">إضافة تعليق</label>
                                                <textarea spellcheck="false" id="myTextarea" name="comment" value="{{ old('comment') }}"></textarea>
                                                <p class="mb-2">تقييم</p>
                                                <div class="form-group row">
                                                    {{-- <label class="col-form-label d-block">تقييم</label> --}}
                                                    <div class="rating d-block" id="stop">
                                                        <span><input class="rated" type="radio" name="rated" id="str5" value="5"><label for="str5"><i class="fas fa-star cos" id="s5"></i></label></span>
                                                        <span><input class="rated" type="radio" name="rated" id="str4" value="4"><label for="str4"><i class="fas fa-star cos" id="s4"></i></label></span>
                                                        <span><input class="rated" type="radio" name="rated" id="str3" value="3"><label for="str3"><i class="fas fa-star cos" id="s3"></i></label></span>
                                                        <span><input class="rated" type="radio" name="rated" id="str2" value="2"><label for="str2"><i class="fas fa-star cos" id="s2"></i></label></span>
                                                        <span><input class="rated" type="radio" name="rated" id="str1" value="1"><label for="str1"><i class="fas fa-star cos" id="s1"></i></label></span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a type="submit"  onclick = "postComment(this, '{{ $chalet->id }}')" class="btn btn-block mb-3">نشر</a> --}}
                                            <button type="button" href="#main-footer" id="button" class="btn btn-block mb-3">نشر</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 text-right">
                    <div class="booking">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header mb-4 text-center">{{ $chalet->price }} شيكل <span class="text-muted">/ 12ساعة</span></h4>
                                <!-- <div class="card mb-4">
                                    <div class="head">
                                        <div class="date date-inter">
                                            <p class="text-muted">تاريخ الدخول </p>
                                            <p>2021-01-27</p>
                                        </div>
                                        <div class="date">
                                            <p class="text-muted">تاريخ المغادرة </p>
                                            <p>2021-01-28</p>
                                        </div>
                                    </div>
                                    <div class="num-day d-flex justify-content-around p-4 text-center">
                                        <p>عدد الليالي : </p>
                                        <p>ليلة واحدة</p>
                                    </div>

                                </div> -->
                                <p class="text-center text-muted mb-2">الاوقات التي يمكنك الحجز بها</p>
                                <div class="card mb-4">
                                    <div class="b-bottom d-flex justify-content-around p-4">
                                        <div class="inter">
                                            <p class="mb-3">وقت الدخول <i class="fas fa-sign-in-alt"></i></p>
                                            <p class="mb-2">08:00 صباحا</p>
                                        </div>
                                        <div class="leave">
                                            <p class="mb-3">وقت الخروج <i class="fas fa-sign-out-alt"></i></p>
                                            <p class="mb-2">07:00 مساء</p>
                                        </div>
                                    </div>

                                    <div class="b-bottom d-flex justify-content-around p-4">
                                        <div class="inter">
                                            <p class="mb-3">وقت الدخول <i class="fas fa-sign-in-alt"></i></p>
                                            <p class="mb-2">08:00 مساء</p>
                                        </div>
                                        <div class="leave">
                                            <p class="mb-3">وقت الخروج <i class="fas fa-sign-out-alt"></i></p>
                                            <p class="mb-2">07:00 صباحا</p>

                                        </div>
                                    </div>

                                    <div class="b-bottom d-flex justify-content-around p-4">
                                        <div class="inter">
                                            <p class="mb-3">وقت الدخول <i class="fas fa-sign-in-alt"></i></p>
                                            <p class="mb-2">08:00 صباحا</p>
                                        </div>
                                        <div class="leave">
                                            <p class="mb-3">وقت الخروج <i class="fas fa-sign-out-alt"></i></p>
                                            <p class="mb-2">07:00 صباحا</p>

                                        </div>
                                    </div>

                                    <div class="b-bottom d-flex justify-content-around p-4">
                                        <div class="inter">
                                            <p class="mb-3">وقت الدخول <i class="fas fa-sign-in-alt"></i></p>
                                            <p class="mb-2">08:00 مساء</p>
                                        </div>
                                        <div class="leave">
                                            <p class="mb-3">وقت الخروج <i class="fas fa-sign-out-alt"></i></p>
                                            <p class="mb-2">07:00 مساء</p>

                                        </div>
                                    </div>

                                </div>
                                <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-block mb-4">احجز</a>


                                <div class="card mb-4 p-4 text-center">
                                    <h4 class="mb-4">تفاصيل الفاتورة </h4>
                                    <p class="mb-4">12ساعة = فترة واحدة</p>
                                    <p class="mb-4">المبلغ X عدد الفترات</p>
                                    <p class="mb-2">مثلا : </p>

                                    <p class="mb-2">{{ $chalet->price }} شيكل x فترة واحدة</p>
                                    <p>= {{ $chalet->price }} شيكل</p>

                                </div>
                                <!-- <a class="btn btn-primary btn-block">
                                    <div class="d-flex justify-content-between">
                                        <p>المجموع</p>
                                        <p>{{ $chalet->price }} شيكل</p>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

        @endsection


    @section('scripts')
    {{--  <script src="{{asset('chalets/website/dist/app.js')}}"></script>  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('chalets/js/axios.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


        {{-- <script>
            $( "#comment" ).validate({
                rules: {
                  comment: {
                    required: true
                  },
                  rated: {
                    required: true
                  }
                },
                messages: {
                    comment: {
                        required: 'ادخل التعليق',
                    },
                    rated: {
                        required: 'قيم الشاليه',
                    }
                }
              });

        </script> --}}

            <script>
                let button = document.getElementById('button');
                let id = '{{ $chalet->id }}';
                button.addEventListener('click', () => {
                    let commentV = document.getElementById("myTextarea").value;
                    let ratedV = document.getElementsByName('rated');
                    for (var i = 0, length = ratedV.length; i < length; i++) {
                        if (ratedV[i].checked) {
                            ratedV = ratedV[i].value;
                            break;
                        }
                    }

                        axios.post('/cms/website/' + id + '/details',{ comment: commentV, rated:ratedV })
                            .then(function(response) {
                                // handle success
                                console.log(response);

                                    document.getElementById("errorMsg").innerHTML = 'تم التعليق بنجاح';
                                    document.getElementById("errorMsg").className = "text-success";
                                    window.location.reload();


                            })
                            .catch(function(error) {
                                // handle error3s
                                console.log(error);
                                document.getElementById("errorMsg").innerHTML = 'ادخل التعليق او التقييم ';
                                document.getElementById("errorMsg").className = "text-danger";

                            })
                            .then(function() {
                                // always executed
                            });

                    });

            </script>

        {{-- <script>
        $(document).ready(function(){
            $('#button').click(function(event){
                event.preventDefault();
                var	name = $('#name').val();
                var	mobile = $('#mobile').val();
                var	address = $('#address').val();
                var	city = $('#city').val();
                $.ajax({
                    type: "POST",
                    url: "upload.php",
                    data: { name:name, mobile:mobile, address:address, city:city },
                    dataType: "json",
                    success: function(result){
                 }
                });
            });
        });
        </script> --}}




        <script>
        const showAdv = document.querySelector('#adv');
        const showcom = document.querySelector('#com');
        const rated = document.querySelector('#rated');
        const featuers = document.querySelector('#featuers');

        showAdv.addEventListener('click', () => {
            rated.classList.remove('remove')
            featuers.classList.remove('show-change')
            showAdv.style.color = '#0B78CF';
            showAdv.style.borderColor = '#0B78CF';
            showcom.style.color = '#707070';
            showcom.style.borderColor = '#707070';

        });

        showcom.addEventListener('click', () => {
            rated.classList.add('remove')
            featuers.classList.add('show-change')
            showAdv.style.color = '#707070';
            showAdv.style.borderColor = '#707070';
            showcom.style.color = '#0B78CF';
            showcom.style.borderColor = '#0B78CF';
        });

        /* RATING */

        $(document).ready(function() {
            $("#s1").click(function() {
                $(".cos").css("color", "#ddd");
                $("#s1").css("color", "#FFC107");
            });
            $("#s2").click(function() {
                $(".cos").css("color", "#ddd");
                $("#s1,#s2").css("color", "#FFC107");
            });
            $("#s3").click(function() {
                $(".cos").css("color", "#ddd");
                $("#s1,#s2,#s3").css("color", "#FFC107");
            });
            $("#s4").click(function() {
                $(".cos").css("color", "#ddd");
                $("#s1,#s2,#s3,#s4").css("color", "#FFC107");
            });
            $("#s5").click(function() {
                $(".cos").css("color", "#ddd");
                $("#s1,#s2,#s3,#s4,#s5").css("color", "#FFC107");
            });
        });

    </script>


    <script src="{{asset('chalets/website/dist/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection

