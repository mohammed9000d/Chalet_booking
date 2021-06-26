    @extends('website.parent')

    @section('nav-color', 'bg-primary')
    @section('active-3', 'active')

    @section('content')
    <!-- HEADER -->

    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> حجوزاتي</p>
                </div>
            </div>
        </div>
    </header>

    <!-- LISTS -->

    <section id="reservations" class="py-5" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            @foreach ($reservations as $reservation)
                <div class="card">
                    <div class="list">

                        <div class="middle">
                            <div class="card-body">
                                <a href="{{route('website.details',[$reservation->chalet->id])}}"
                                    <h3 class="text-info">{{ $reservation->chalet->name }}</h3>
                                </a>
                                <p><i class="fas fa-map-marker-alt"></i>{{ $reservation->chalet->address }}</p>
                                <a href="#" class="text-muted" data-toggle="modal" data-target="#detailes"><i class="fas fa-info-circle"></i>  تفاصيل الحجز</a>

                                <div class="modal" id="detailes">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">Detailes</h5>
                                            </div>
                                            <div class=modal-body>
                                                <form>
                                                    <div id="num" class="form-group py-1">
                                                        <label for="name">الاسم الاول</label>
                                                        <input type="text" class="form-control" value="{{ $user->first_name }}">
                                                    </div>
                                                    <div class="form-group py-1">
                                                        <label for="name">الاسم الاخير</label>
                                                        <input type="text" class="form-control" value="{{ $user->last_name }}">
                                                    </div>
                                                    <div class="form-group py-1">
                                                        <label for="name">الايميل</label>
                                                        <input type="email" class="form-control" value="{{ $user->email }}">
                                                    </div>
                                                    <div class="form-group py-1">
                                                        <label for="name">الهاتف</label>
                                                        <input type="text" class="form-control" value="{{ $user->mobile }}">
                                                    </div>
                                                    <div class="form-group py-1">
                                                        <label for="name">تاريخ الحجز</label>
                                                        <input type="text" class="form-control" value="{{ $reservation->date }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="gender">توقيت الحجز</label>
                                                        <select id="gender" class="form-control">
                                                            <option>{{ $reservation->time }}</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead">حالة الحجز</p>
                                <div class="links">
                                    <a href="{{route('website.details',[$reservation->chalet->id])}}" class="btn blue-bt btn-lg mb-lg-4" id="changing"><i class="fas fa-info-circle"></i> {{ $reservation->status }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </section>

    <!-- PAGINATION -->
    <div class="pagination pagination justify-content-center">
        {{ $reservations->links() }}
    </div>

    @endsection


    @section('scripts')
    <script src="{{asset('chalets/website/dist/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection
