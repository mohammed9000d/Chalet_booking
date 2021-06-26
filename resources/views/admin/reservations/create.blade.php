@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/select2.min.css')}}">
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Reservation</h4>
                </div>
                <div class="card-body">
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

                <form action="{{ route('reservations.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label class="col-form-label">Chalet Name</label>
                            <select class="form-control" name="chalet_id" id="chalet_id">>
                                <option>-- Select --</option>
                                @foreach($chalets as $chalet)
                                <option value="{{$chalet->id}}">{{ $chalet->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">User Name</label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option>-- Select --</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Date</label>
                            <input name="date" id="date" value="{{ old('date') }}" type="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Time</label>
                            <select class="form-control" name="time" id="time">
                                <option>-- Select --</option>
                                <option>الفترة المسائية (من الساعة ال 8:00 م الى الساعة ال 7:00 ص)</option>
                                <option>الفترة الصباحية (من الساعة ال 8:00 ص الى الساعة ال 7:00 م)</option>
                            </select>
                        </div>

                        {{-- <input name="date_time" id="date_time" value="{{ old('date_time') }}" type="text" class="form-control"> --}}

                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option>-- Select --</option>
                                <option>قيد المتابعة</option>
                                <option>تم التأكيد</option>
                            </select>
                        </div>

                        <div class="text-right">
                            {{--  <button type="button" onclick="postReservation()" class="btn btn-primary">Submit</button>  --}}
                            <button type="submit" id="post" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
    {{--  <script src="{{ asset('chalets/js/axios.js') }}"></script>  --}}

    {{--  <script>
        function postReservation() {
            let userId = document.getElementById("user_id").value;
            let chaletId = document.getElementById('chalet_id').value;
            let date = document.getElementById('date').value;
            let time = document.getElementById('time').value;
            let status = document.getElementById('status').value;
            let dateTime = date + '-' + time;

            axios.post('/cms/admin/reservations', { user_id: userId, chalet_id: chaletId, date_time: dateTime , status: status})
                .then(function(response) {
                    // handle success
                    console.log(response);
                })
                .catch(function(error) {
                    // handle error3s
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        }



    </script>  --}}

        {{-- <script>


            let postF = document.getElementById('post');
            postF.addEventListener('submit', () => {
                let date = document.getElementById("date").value;
                let time = document.getElementById('time').value;
                let dateTime = document.getElementById('date_time');
                dateTime.value = date+'-'+time;
                console.log(date+'-'+time)
            });



    </script> --}}


    <script src="{{asset('chalets/admin/assets/js/select2.min.js')}}"></script>
@endsection

