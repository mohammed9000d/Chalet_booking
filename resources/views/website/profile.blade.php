    @extends('website.parent')

    @section('nav-color', 'bg-primary')

    @section('content')


    <!-- HEADER -->

    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> الملف الشخصي</p>
                </div>
            </div>
        </div>
    </header>


    <section id="profile" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            <div class="cover">
                <div class="space pb-5">
                    <div class="bg-white">
                        <div class="right profile py-5 text-center">
                            <a href="#">
                                <img src="{{url('images/user/'.Auth()->user()->image)}}" alt="الصورة الشخصية">
                            </a>

                            <h3 class="mb-3">{{ Auth()->user()->first_name }} </h3>
                            <p class="mb-3">من هنا يمكنك تعديل بياناتك الشخصية</p>

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
                                {{session()->get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <form action="{{ route('website.edit_profile',[Auth()->user()->id]) }}"  method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div id="num" class="form-group py-1">
                                    <input type="text" class="form-control" name="first_name" placeholder="الاسم الاول" value="{{ Auth()->user()->first_name }}">
                                </div>
                                <div class="form-group py-1">
                                    <input type="text" class="form-control" name="last_name" placeholder="الاسم الاخير" value="{{ Auth()->user()->last_name }}">
                                </div>
                                <div class="form-group py-1">
                                    <input type="email" class="form-control" name="email" placeholder="الايميل" value="{{ Auth()->user()->email }}">
                                </div>
                                <div class="form-group py-1">
                                    <input type="text" class="form-control" name="mobile" placeholder="رقم الهاتف" value="{{ Auth()->user()->mobile }}">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="state_id" name="state_id">
                                        <option>-- اختر منطقتك --</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}"selected="{{ Auth()->user()->state->name }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="birth_date" value="{{ Auth()->user()->birth_date }}" type="date" class="form-control">
                                </div>

                                <a id="show-2" class="btn btn-log mb-4 mt-2 btn-block"> تغيير الصورة الشخصية</a>
                                <div id="change-img" class="display-n">
                                    <div class="form-group py-1">
                                        <input class="form-control" name="image" type="file" id="myfile" accept="image/*">
                                    </div>
                                </div>

                                <a id="show" class="btn btn-log mb-4 mt-2 btn-block">تغيير كلمة المرور</a>
                                <div id="change-pass" class="display-n">
                                    <div class="form-group py-1">
                                        <input type="password" class="form-control" placeholder="كلمة المرور الحالية">
                                    </div>
                                    <div class="form-group py-1">
                                        <input type="password" class="form-control" placeholder="كلمة المرور الجديدة">
                                    </div>
                                    <div class="form-group py-1">
                                        <input type="password" class="form-control" placeholder="تأكيد كلمة المرور">
                                    </div>
                                </div>

                                <a href="{{ route('user.logout') }}" class="btn btn-log mb-4 mt-2 btn-block"> تسجيل الخروج</a>
                                <button type="submit" class="btn btn-log mb-4 mt-2 btn-block">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>




    @section('scripts')
    <script src="{{asset('chalets/website/dist/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endsection
