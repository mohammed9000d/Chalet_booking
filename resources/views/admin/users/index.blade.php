@extends('admin.parent')

@section('title','Users')

@section('style')

@endsection

@section('page-title','Users')
@section('page-breadcrumb','Users')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right mt-2">Add</a>
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
                                    <th>Image</th>
                                    <th>ID</th>
                                    <th>First Name </th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobiel</th>
                                    <th>Gender</th>
                                    <th>Birth date</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Setting</th>


                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-lg">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="{{url('images/user/'.$user->image) }}">
                                            </div>
                                        </td>
                                         <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile}}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->birth_date}}</td>
                                        <td>{{ $user->status}}</td>
                                        <td>{{ $user->created_at}}</td>
                                        <td>
                                            <a href="{{ route('users.edit',[$user->id]) }}" type="button" class="btn btn-primary active">Edit</a>
                                            <a href = "#" onclick = "confirmDelete(this,'{{ $user->id }}')" type="button" class="btn btn-danger">Delete</a>

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
    <script>
        function confirmDelete(app, id){
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
                    deleteCity(app, id);
                }
              })
        }
        function deleteCity(app, id){
            axios.delete('/cms/admin/users/'+id)
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
