@extends('admin.parent')

@section('title','Reservations')

@section('style')

@endsection

@section('page-title','Reservations')
@section('page-breadcrumb','Reservations')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('reservations.create') }}" class="btn btn-primary float-right mt-2">Add</a>
    </div>
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
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Chlet ID</th>
                                <th>Chlet Name</th>
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
                                    <td>{{ $reservation->id}}</td>
                                    <td>{{ $reservation->user_id}}</td>
                                    <td>{{ $reservation->chalet_id}}</td>
                                    <td>{{ $reservation->chalet->name }}</td>
                                    <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                                    <td>{{ $reservation->user->mobile }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->created_at }}</td>
                                    <td>
                                        <a href = "{{route('reservations.edit',[$reservation->id])}}"type="button" class="btn btn-primary active">Edit</a>
                                        <a href = "#" onclick = "confirmDelete(this,'{{ $reservation->id }}')" type="button" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <dive class = "row justify-content-center">
                    {{ $cities->links() }}
                </dive>  --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('chalets/js/axios.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(app,id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                 deleteSpecialty(app,id)
                }
              })
        }
        function deleteSpecialty(app,id){
            axios.delete('/cms/admin/reservations/'+id)
            .then(function (response) {
            // handle success
            console.log(response);
            app.closest('tr').remove();
            showDeleted(response.data);
            })
            .catch(function (error) {
            // handle error
            console.log(error);
            })
            .then(function () {
            // always executed
            });
    }
        function showDeleted(data){
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.icon,
                showConfirmButton:false,
                timer: 2000,
              }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
                }
              })
        }
    </script>

@endsection
