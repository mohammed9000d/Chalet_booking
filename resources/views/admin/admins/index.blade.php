@extends('admin.parent')

@section('title','Admins')

@section('style')

@endsection

@section('page-title','Admins')
@section('page-breadcrumb','Admins')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('admins.create') }}" class="btn btn-primary float-right mt-2">Add</a>
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
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-lg">
                                                <img class="avatar-img rounded-circle" alt="User Image" src="{{url('images/admin/'.$admin->image) }}">
                                            </div>
                                        </td>
                                         <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->first_name }}</td>
                                        <td>{{ $admin->last_name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->mobile}}</td>
                                        <td>{{ $admin->gender }}</td>
                                        <td>{{ $admin->birth_date}}</td>
                                        <td>{{ $admin->status}}</td>
                                        <td>{{ $admin->created_at}}</td>
                                        <td>
                                            <a href="{{ route('admins.edit',[$admin->id]) }}" type="button" class="btn btn-primary active">Edit</a>
                                            <a href = "#" onclick = "confirmDelete(this,'{{ $admin->id }}')" type="button" class="btn btn-danger">Delete</a>

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
            axios.delete('/cms/admin/admins/'+id)
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
