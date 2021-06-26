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
                    <h4 class="card-title">Edit City</h4>
                </div>

                <div class="card-body">

                    @if(session()->has('alert-type'))
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
                    <form action="{{ route('cities.update', [$city->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>City Name</label>
                            <input name = "name"value = "{{ $city->name }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Activity Status</label>
                            <div class="status-toggle">
                                <input name = "status" type="checkbox" id="status_1" class="check"
                                @if ($city->status === 'Active')checked @endif>
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
@endsection
