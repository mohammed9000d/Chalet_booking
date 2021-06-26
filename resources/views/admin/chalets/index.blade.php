@extends('admin.parent')

@section('title','Chalets')

@section('style')

@endsection

@section('page-title','Chalets')
@section('page-breadcrumb','Chalets')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('chalets.create') }}" class="btn btn-primary float-right mt-2">Add</a>
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
                                    <th>Name</th>
                                    <th>Owner Id</th>
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
                                        <td>{{ $chalet->id }}</td>
                                        <td>{{ $chalet->name }}</td>
                                        <td>{{ $chalet->owner_id }}</td>
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
                                            <a href="{{ route('chalets.edit',[$chalet->id]) }}" type="button" class="btn btn-primary active">Edit</a>
                                            <a href = "#" onclick = "confirmDelete(this,'{{ $chalet->id }}')" type="button" class="btn btn-danger">Delete</a>

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
            axios.delete('/cms/admin/chalets/'+id)
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
