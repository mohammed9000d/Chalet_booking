@extends('admin.parent')

@section('title','Comments & Rated')

@section('style')

@endsection

@section('page-title','Comments & Rated')
@section('page-breadcrumb','Comments & Rated')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('comments.create') }}" class="btn btn-primary float-right mt-2">Add</a>
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
                                <th>Comment</th>
                                <th>Rated</th>
                                <th>Created At</th>
                                <th>Setting</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id}}</td>
                                    <td>{{ $comment->user_id}}</td>
                                    <td>{{ $comment->chalet_id}}</td>
                                    <td>{{ $comment->chalet->name }}</td>
                                    <td>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</td>
                                    <td>{{ $comment->comment}}</td>
                                    <td>{{ $comment->rated}} -Stars</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        <a href = "{{route('comments.edit',[$comment->id])}}"type="button" class="btn btn-primary active">Edit</a>
                                        <a href = "#" onclick = "confirmDelete(this,'{{ $comment->id }}')" type="button" class="btn btn-danger">Delete</a>
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
            axios.delete('/cms/admin/comments/'+id)
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
