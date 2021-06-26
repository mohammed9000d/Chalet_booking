@extends('owner.parent')

@section('title','Images')

@section('style')

@endsection

@section('page-title','Images')
@section('page-breadcrumb','Images')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{ route('images.create') }}" class="btn btn-outline-primary float-right mt-2">Add</a>
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
                                <th>Images</th>
                                <th>Created At</th>
                                <th>Setting</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        <div class="avatar avatar-xl">
                                            <img class="avatar-img" alt="User Image" src="{{url('images/slider/'.$slider->image) }}">
                                        </div>
                                    </td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        <a href = "#" onclick = "confirmDelete(this,'{{ $slider->id }}')" type="button" class="btn btn-outline-danger">Delete</a>
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
            axios.delete('/cms/admin/sliders/'+id)
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
