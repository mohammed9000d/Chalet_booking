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
                            <p class="mb-3">قم بتسجيل الدخول حتى تستطيع اتمام عمليات الحجز</p>

                            @if (session()->has('alert-type'))
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

                            <!-- Form -->
                            <form action="{{ route('user.register') }}" method = "POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group py-1">
                                    <input class="form-control" name="first_name" value="{{ old('first_name') }}" type="text" placeholder="الاسم الاول">
                                </div>
                                <div class="form-group py-1">
                                    <input class="form-control" name="last_name" value="{{ old('last_name') }}" type="text" placeholder="الاسم الاخير">
                                </div>
                                <div class="form-group py-1">
                                    <input class="form-control" name="email" value="{{ old('email') }}" type="email" placeholder="الايميل">
                                </div>
                                <div class="form-group py-1">
                                    <input class="form-control" name="mobile" value="{{ old('mobile') }}" type="tel" placeholder="رقم الهاتف">
                                </div>
                                <div class="form-group">
                                    {{--  <label class="col-form-label">City</label>  --}}
                                    <select class="form-control" id="state_id" name="state_id">
                                        <option>-- اختر محافظتك --</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group py-1">
                                    <input class="form-control" name="password" value="{{ old('password') }}" type="password" placeholder="كلمة المرور">
                                </div>
                                <div class="form-group py-1">
                                    <input class="form-control" type="password" placeholder="تأكيد كلمة المرور">
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">الجنس</label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-2" type="radio" name="gender" id="gender_male" value="Male" checked>
                                            <label class="form-check-label mt-2" for="gender_male">
                                                ذكر
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-2" type="radio" name="gender" id="gender_female" value="Female">
                                            <label class="form-check-label mt-2" for="gender_female">
                                                انثى
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">الميلاد</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="birth_date" value="{{ old('birth_date') }}" type="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4">صورتك</label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="image" type="file" accept="image/*">
                                        {{-- <input type="file" class="custom-file-input" name="author_image"> --}}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-log mb-4 mt-2 btn-block">تسجيل</button>
                            </form>

                        </div>
                        <div class="col-lg-6 d-none d-lg-block left-1"></div>
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
