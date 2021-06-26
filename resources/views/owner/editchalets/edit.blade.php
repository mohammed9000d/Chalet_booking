@extends('owner.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/select2.min.css')}}">
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Chalet</h4>
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
                <form action="{{ route('editchalets.update',[$chalet->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
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

                        {{--  <div class="form-group">
                            <label class="col-form-label">Owner Name</label>
                            <select class="form-control" name="owner_id">
                                <option>-- Select --</option>
                                @foreach($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->id}}</option>
                                @endforeach
                            </select>
                        </div>  --}}

                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ $chalet->name }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" value="{{ $chalet->address }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Chalet Space</label>
                            <input name="chalet_space" value="{{ $chalet->chalet_space }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" value="{{ $chalet->price }}" type="text" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Description</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter description here" spellcheck="false" name="description">{{ $chalet->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Seating Places</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter seating places here" spellcheck="false" name="seating_places">{{ $chalet->seating_places }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Swimming Pools</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter swimming pools here" spellcheck="false" name="swimming_pools">{{ $chalet->swimming_pools }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Accompanying</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter accompanying here" spellcheck="false" name="accompanying">{{ $chalet->accompanying }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">washrooms</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter washrooms here" spellcheck="false" name="washrooms">{{ $chalet->washrooms }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Kitchen Facilities</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter kitchen facilities here" spellcheck="false" name="kitchen_facilities">{{ $chalet->kitchen_facilities }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Bedrooms</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter bedrooms here" spellcheck="false" name="bedrooms">{{ $chalet->bedrooms }}</textarea>
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
