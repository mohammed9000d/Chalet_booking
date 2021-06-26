@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/select2.min.css')}}">
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Users</h4>
                </div>

                <div class="card-body">

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
                    <form action="{{ route('users.store') }}" method="POST" id="create_admins_form"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">City</label>
                            <select class="form-control" id="city_id" name="city_id" onchange="getCityStates()">
                                <option>-- Select --</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">State</label>
                            <select class="form-control" id="state_id" name="state_id">
                                <option>-- Select --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input name="mobile" value="{{ old('mobile') }}" type="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Birth Date</label>
                            <input name="birth_date" value="{{ old('birth_date') }}" type="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="d-block">Gender:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male">
                                <label class="form-check-label" for="gender_male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
                                <label class="form-check-label" for="gender_female">Female</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" name="image" type="file" accept="image/*">
                                {{-- <input type="file" class="custom-file-input" name="author_image"> --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Activity Status</label>
                            <div class="status-toggle">
                                <input name="status" type="checkbox" id="status_1" class="check" checked>
                                <label for="status_1" class="checktoggle">checkbox</label>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('chalets/admin/assets/js/select2.min.js')}}"></script>

    <script>
        function getCityStates(){
            var selectedCityId = document.getElementById('city_id').value;

            var stateSelect = document.getElementById('state_id');
            stateSelect.length = 0;

            @foreach($cities as $city)
            if(selectedCityId == '{{ $city->id }}'){
                @foreach($city->states as $state)
                    var option = document.createElement('option');
                    option.text = '{{ $state->name }}';
                    option.value = '{{ $state->id }}'
                    stateSelect.add(option);
                @endforeach
            }
            @endforeach
        }
    </script>
@endsection
