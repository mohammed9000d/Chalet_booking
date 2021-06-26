@extends('website.parent')

@section('nav-color', 'bg-primary')
@section('active-2', 'active')

    <!-- HEADER -->
    @section('content')
    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> نتائج البحث</p>
                </div>
            </div>
        </div>
    </header>

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
        @if($chalets->isNotEmpty())
            @foreach ($chalets as $chalet)
                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $chalet->name }}</h3
                                <p><i class="fas fa-map-marker-alt"></i> {{ $chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> {{ $chalet->rated }} تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>

                                <form action="{{ route('website.favorite_chalet',[$chalet->id])}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-white text-danger"><i class="fas fa-heart"></i>  اضافة الى المفضلة </button>
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
            @else
            <div>
                <h3 class="text-danger text-center my-5">لا توجد نتائج....</h3>
            </div>
        @endif
        </div>



        </div>
    </section>

    @endsection

    @section('scripts')
    <script src="{{asset('chalets/website/dist/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection
