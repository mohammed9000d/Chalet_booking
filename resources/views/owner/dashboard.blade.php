@extends('owner.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/plugins/morris/morris.css')}}">
@endsection

@section('page-title','Welcome Owner!')
@section('page-breadcrumb','Home')

@section('page-wrapper')
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">

            <!-- Sales Chart -->
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Reservation</h4>
                </div>
                <div class="card-body">
                    <div id="morrisArea"></div>
                </div>
            </div>
            <!-- /Sales Chart -->

        </div>
        <div class="col-md-12 col-lg-6">

            <!-- Invoice Chart -->
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
                </div>
                <div class="card-body">
                    <div id="morrisLine"></div>
                </div>
            </div>
            <!-- /Invoice Chart -->

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->
            <div class="card card-table">
                <div class="card-header">
                    <h4 class="card-title">reservations List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Mobile</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                                        <td>{{ $reservation->user->mobile }}</td>
                                        <td>{{ $reservation->date }}</td>
                                        <td>{{ $reservation->time }}</td>
                                        <td>{{ $reservation->status }}</td>
                                        <td>{{ $reservation->created_at }}</td>
                                        <td>
                                            <a href = "{{route('chaletres.edit',[$reservation->id])}}"type="button" class="btn btn-outline-primary">Edit</a>
                                            <a href = "#" onclick = "confirmDelete(this,'{{ $reservation->id }}')" type="button" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('chalets/admin/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('chalets/admin/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('chalets/admin/assets/js/chart.morris.js')}}"></script>
@endsection
