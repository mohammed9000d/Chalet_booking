    @extends('website.parent')

    @section('nav-color', 'bg-primary')
    @section('active-4', 'active')
    @section('content')
    <!-- HEADER -->

    <header id="header" class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>الرئيسية <i class="fas fa-chevron-left"></i> المفضلة</p>
                </div>
            </div>
        </div>
    </header>


    <!-- LISTS -->

    <section id="lists" class="py-5" dir="rtl" lang="ar" xml:lang="ar">
        <div class="container">
            @foreach ($favorites as $favorite)
            <section>
                                <div class="card">
                    <div class="list">
                        <img src="{{url('images/chalet/'.$favorite->chalet->image) }}" alt="">

                        <div class="middle">
                            <div class="card-body">
                                <h3>{{ $favorite->chalet->name }}</h3>
                                <p><i class="fas fa-map-marker-alt"></i>{{ $favorite->chalet->address }}</p>
                                <p><i class="fas fa-star text-warning"></i> 4,5 تقييم(15)</p>
                                <p class="text-muted lead"><i class="fas fa-eye"></i> 100k view</p>
                                <p class="text-primary">تم حجزه 5 مرات خلال هذا الاسبوع</p>
                                <a href = "#" onclick = "confirmDelete(this,'{{ $favorite->id }}')" type="button"class="btn btn-white text-danger"><i class="far fa-trash-alt"></i>  حذف من المفضلة</a>
                            </div>

                        </div>
                        <div class="left">
                            <div class="card-body">
                                <p class="lead text-success">{{ $favorite->chalet->price }} شيكل /<span class="text-muted">ليلة</span></p>
                                <p class="mb-4">{{ $favorite->chalet->price }} شيكل القيمة الاجمالية </p>
                                <div class="links">
                                    <a href="{{route('website.details',[$favorite->chalet->id])}}" class="btn btn-secondary btn-lg mb-lg-4"><i class="fas fa-info-circle"></i> التفاصيل</a>
                                    <a href="{{route('website.booking',[$favorite->chalet->id])}}" class="btn btn-secondary btn-lg mr-1"><i class="far fa-calendar-check"></i> حجز الآن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @endforeach

        </div>
    </section>

    <!-- PAGINATION -->
    <div class="pagination pagination justify-content-center">
        {{ $favorites->links() }}
    </div>



    @endsection

    @section('scripts')
    <script src="{{asset('chalets/website/dist/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
            axios.delete('/cms/website/'+id+'/favorite')
            .then(function (response) {
            // handle success
            console.log(response);
            app.closest('section').remove();
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
