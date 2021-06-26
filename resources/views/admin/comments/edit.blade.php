@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">
    <style>
        .rating {
            float:left;
            width:300px;
        }
        .rating span { float:right; position:relative; }
        .rating span input {
            position:absolute;
            top:0px;
            left:0px;
            opacity:0;
        }
        .rating span label {
            display:inline-block;
            width:30px;
            height:30px;
            text-align:center;
            color:#FFF;
            background:#ccc;
            font-size:30px;
            margin-right:2px;
            line-height:30px;
            border-radius:50%;
            -webkit-border-radius:50%;
        }
        .rating span:hover ~ span label,
        .rating span:hover label,
        .rating span.checked label,
        .rating span.checked ~ span label {
            background:#F90;
            color:#FFF;
        }
    </style>
@endsection

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Comments & Rated</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    @endforeach

                    @endif
                    @if (session()->has('alert-type'))
                    <div class="alert {{session()->get('alert-type')}} alert-dismissible fade show" role="alert">
                        {{session()->get('messege')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                <form action="{{route('comments.update', [$comment->id])}}"method="post">
                    @csrf
                    @method('put')
                        <div class="form-group">
                            <label class="col-form-label">Chalet Name</label>
                            <select class="form-control" name="chalet_id">
                                <option>-- Select --</option>
                                @foreach($chalets as $chalet)
                                <option value="{{$chalet->id}}">{{ $chalet->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">User Name</label>
                            <select class="form-control" name="user_id">
                                <option>-- Select --</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Comment</label>
                            <div class="col-md-10"><grammarly-extension data-grammarly-shadow-root="true" class="cGcvT" style="position: absolute; top: 0px; left: 0px; pointer-events: none;"></grammarly-extension>
                                <textarea rows="5" cols="5" class="form-control" placeholder="Enter comment here" spellcheck="false" name="comment">{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Rated</label>
                            <div class="rating d-block">
                                <span><input type="radio" name="rated" id="str5" value="5"><label for="str5"></label></span>
                                <span><input type="radio" name="rated" id="str4" value="4"><label for="str4"></label></span>
                                <span><input type="radio" name="rated" id="str3" value="3"><label for="str3"></label></span>
                                <span><input type="radio" name="rated" id="str2" value="2"><label for="str2"></label></span>
                                <span><input type="radio" name="rated" id="str1" value="1"><label for="str1"></label></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
    <script src="{{asset('doccure/admin/assets/js/select2.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);

            $('.rating input').click(function () {
                $(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
              function(){
                var userRating = this.value;
                alert(userRating);
            });
        });
    </script>
@endsection
