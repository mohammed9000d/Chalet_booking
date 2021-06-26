@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/plugins/morris/morris.css')}}">
@endsection

@section('page-title','Welcome Admin!')
@section('page-breadcrumb','Home')

@section('page-wrapper')
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
                        <div class="dash-count">
                            <h3>{{ $owner_count }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Owners</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fas fa-users"></i>
										</span>
                        <div class="dash-count">
                            <h3>{{ $user_count }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Users</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="far fa-calendar-check"></i>
										</span>
                        <div class="dash-count">
                            <h3>{{ $res_count }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Reservations</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fas fa-hotel"></i>
										</span>
                        <div class="dash-count">
                            <h3>{{ $chalet_count }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Chalets</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  <div class="row">
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
    </div>  --}}
    <div class="row">
        <div class="col-md-6 d-flex">

            <!-- Recent Orders -->
            <div class="card card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Owners List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Owner Name</th>
                                <th>Email</th>
                                <th>Mobiel</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($owners as $owner)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-lg">
                                            <img class="avatar-img rounded-circle" alt="owner Image" src="{{url('images/owner/'.$owner->image) }}">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"></a>
                                            <a href="profile.html">{{ $owner->first_name }} {{ $owner->last_name }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $owner->email }}</td>
                                    <td>{{ $owner->mobile}}</td>
                                    <td>{{ $owner->status}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Recent Orders -->

        </div>
        <div class="col-md-6 d-flex">

            <!-- Feed Activity -->
            <div class="card  card-table flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Users List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobiel</th>
                                <th>Status</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="avatar avatar-lg">
                                        <img class="avatar-img rounded-circle" alt="user Image" src="{{url('images/user/'.$user->image) }}">
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm mr-2"></a>
                                        <a href="profile.html">{{ $user->first_name }} {{ $user->last_name }}</a>
                                    </h2>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile}}</td>
                                <td>{{ $user->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Feed Activity -->

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
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Chlet ID</th>
                                <th>Chlet Name</th>
                                <th>User Name</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id}}</td>
                                    <td>{{ $reservation->user_id}}</td>
                                    <td>{{ $reservation->chalet_id}}</td>
                                    <td>{{ $reservation->chalet->name }}</td>
                                    <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
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
