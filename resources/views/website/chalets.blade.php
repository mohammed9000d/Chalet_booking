@extends('website.parent')

@section('nav-color', 'bg-primary')
@section('active-2', 'active')

    <!-- HEADER -->
    @section('content')
    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> الشاليهات</p>
                </div>
            </div>
        </div>
    </header>

    <!-- FELTERING -->

    <section id="feltering" class="py-4" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            <div class="row text-right">
                <div class="col-lg-2"></div>
                {{--  <div class="col-lg-5">
                    <div class="form-group">
                        <label for="gender">المحافظة</label>
                        <select id="gender">
                            <option>-- اختر--</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  --}}
                <div class="col-lg-8">
                    {{--  <label>الفئات</label>  --}}
                    <div class="category bg-white p-2">
                        <ul class="nav nav-pills justify-content-start">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-muted mx-lg-4 px-4 active-1">الكل</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-muted mx-lg-4 px-5 active-2">الأعلى تقييم</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-muted mx-lg-4 px-4 active-4">الأقل سعر</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-muted mx-lg-4 px-4 active-5">الأعلى سعر</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>

    <!-- LISTS -->

    <section id="lists" class="py-5" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
        <div id="all" class="animation_chalets">
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
            @foreach ($chalets as $chalet)
                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $chalet->name }}</h3
                                <p><i class="fas fa-map-marker-alt"></i> {{ $chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> 5,0 تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>

                                {{--  <form action="{{ route('website.favorite_chalet',[$chalet->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-white text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </button>
                                </form>  --}}

                                <div id="errorMsg"></div>

                                <form method="POST">
                                    @csrf
                                    <button type="button" onclick="favorite('{{ $chalet->id }}')" class="btn btn-white text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </button>
                                </form>

                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead text-success">{{ $chalet->price }} شيكل /<span class="text-muted">ليلة</span></p>
                                <p class="mb-4">{{ $chalet->price }} شيكل القيمة الاجمالية </p>
                                <div class="links">
                                    <a href="{{route('website.details',[$chalet->id])}}" class="btn btn-secondary btn-lg mb-lg-4"><i class="fas fa-info-circle"></i> التفاصيل</a>
                                    <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-secondary btn-lg mr-1"><i class="far fa-calendar-check"></i> حجز الآن</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="highest_rating" class="animation_chalets">
            @foreach ($chalets_rated as $chalet)
                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $chalet->name }}</h3
                                <p><i class="fas fa-map-marker-alt"></i> {{ $chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> 4,5 تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>
                                <a href="#" class=" text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </a>
                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead text-success">{{ $chalet->price }} شيكل /<span class="text-muted">ليلة</span></p>
                                <p class="mb-4">{{ $chalet->price }} شيكل القيمة الاجمالية </p>
                                <div class="links">
                                    <a href="{{route('website.details',[$chalet->id])}}" class="btn btn-secondary btn-lg mb-lg-4"><i class="fas fa-info-circle"></i> التفاصيل</a>
                                    <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-secondary btn-lg mr-1"><i class="far fa-calendar-check"></i> حجز الآن</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div id="lowest_price" class="animation_chalets">
            @foreach ($chalets_Lprice as $chalet)
                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $chalet->name }}</h3
                                <p><i class="fas fa-map-marker-alt"></i> {{ $chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> 4,5 تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>
                                <a href="#" class=" text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </a>
                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead text-success">{{ $chalet->price }} شيكل /<span class="text-muted">ليلة</span></p>
                                <p class="mb-4">{{ $chalet->price }} شيكل القيمة الاجمالية </p>
                                <div class="links">
                                    <a href="{{route('website.details',[$chalet->id])}}" class="btn btn-secondary btn-lg mb-lg-4"><i class="fas fa-info-circle"></i> التفاصيل</a>
                                    <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-secondary btn-lg mr-1"><i class="far fa-calendar-check"></i> حجز الآن</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="hightest_price" class="animation_chalets">
            @foreach ($chalets_Hprice as $chalet)
                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $chalet->name }}</h3
                                <p><i class="fas fa-map-marker-alt"></i> {{ $chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> 4,5 تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>
                                <a href="#" class=" text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </a>
                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead text-success">{{ $chalet->price }} شيكل /<span class="text-muted">ليلة</span></p>
                                <p class="mb-4">{{ $chalet->price }} شيكل القيمة الاجمالية </p>
                                <div class="links">
                                    <a href="{{route('website.details',[$chalet->id])}}" class="btn btn-secondary btn-lg mb-lg-4"><i class="fas fa-info-circle"></i> التفاصيل</a>
                                    <a href="{{route('website.booking',[$chalet->id])}}" class="btn btn-secondary btn-lg mr-1"><i class="far fa-calendar-check"></i> حجز الآن</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        </div>
    </section>

    <!-- PAGINATION -->
    <div class="pagination pagination justify-content-center">
        {{ $chalets->links() }}
    </div>

    @endsection

    @section('scripts')
    <script>
        function favorite(id) {
            axios.post('/cms/website/' + id + '/chalets')
                .then(function(response) {
                    // handle success
                    console.log(response);
                    alert('تم اضافته الى المفضلة')

                        //define a new dialog
                        alertify.dialog('myAlert',function(){
                          return{
                            main:function(message){
                              this.message = message;
                            },
                            setup:function(){
                                return {
                                  buttons:[{text: "cool!", key:27/*Esc*/}],
                                  focus: { element:0 }
                                };
                            },
                            prepare:function(){
                              this.setContent(this.message);
                            }
                        }});

                      //launch it.
                      alertify.myAlert("Browser dialogs made easy!");

                })
                .catch(function(error) {
                    // handle error3s
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
            }



    </script>



    <script src="{{ asset('chalets/js/axios.js') }}"></script>
    <script src="{{asset('chalets/website/dist/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection
