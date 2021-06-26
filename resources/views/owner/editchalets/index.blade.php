@extends('owner.parent')

@section('title','Chalets')

@section('style')

@endsection

@section('page-title','Chalets')
@section('page-breadcrumb','Chalets')

@section('action')
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Chalet Space</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Seating Places</th>
                                    <th>Swimming Pools</th>
                                    <th>Accompanying</th>
                                    <th>washrooms</th>
                                    <th>Kitchen Facilities</th>
                                    <th>Bedrooms</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Setting</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chalets as $chalet)
                                    <tr>
                                        <td>{{ $chalet->name }}</td>
                                        <td>{{ $chalet->address }}</td>
                                        <td>{{ $chalet->chalet_space }}</td>
                                        <td>{{ $chalet->price }}</td>
                                        <td>{{ $chalet->description}}</td>
                                        <td>{{ $chalet->seating_places }}</td>
                                        <td>{{ $chalet->swimming_pools}}</td>
                                        <td>{{ $chalet->accompanying}}</td>
                                        <td>{{ $chalet->washrooms}}</td>
                                        <td>{{ $chalet->kitchen_facilities}}</td>
                                        <td>{{ $chalet->bedrooms}}</td>
                                        <td>{{ $chalet->status}}</td>
                                        <td>{{ $chalet->created_at}}</td>
                                        <td>
                                            <a href="{{ route('editchalets.edit',[$chalet->id]) }}" type="button" class="btn btn-outline-primary">Edit</a>

                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('chalets/js/axios.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
