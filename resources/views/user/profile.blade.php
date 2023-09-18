@extends('layout.master')

@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <!-- ***** Banner Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-profile ">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{asset('assets/images/profile.jpg')}}" alt=""
                                             style="border-radius: 23px;">
                                    </div>
                                    <div class="col-lg-4 align-self-center">
                                        <div class="main-info header-text">
                                            <span>Hi</span>
                                            <h4>{{$user->name}}</h4>
                                            <p>You can see your posts and information here.</p>
                                            <div class="main-border-button">
                                                <a href="{{route('EditUser', $user)}}">edit your information</a>
                                            </div>

                                            <form id="form1" action="{{route('Logout')}}" method="post">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <button type="submit"
                                                            class="btn btn-xs btn-danger btn-flat show_confirm">
                                                        Log out
                                                    </button>
                                                </div>
                                            </form>
                                            <br>
                                            <form id="form2" action="{{route('DeleteUser' , $user)}}" method="post">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <input name="delete" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                            class="btn btn-xs btn-danger btn-flat show_confirm"
                                                            data-toggle="tooltip" title='Delete'>
                                                        Delete Account
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-center">
                                        <ul>
                                            <li>Posts count <span>{{$post_count}}</span></li>
                                            <li>views count <span>{{$view_count}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <!-- ***** Posts Library Start ***** -->
                    <div class="gaming-library profile-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Your </em> Posts</h4>
                            </div>
                            <div class="item">
                                @foreach($posts as $post)
                                    <ul>
                                        {{--                                    <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>--}}
                                        <li><h4>title</h4><span>{{ $post->title }}</span></li>
                                        <li><h4>Date Added</h4><span>{{$post->created_at->diffForHumans()}}</span></li>
                                        <li><h4>view</h4><span>{{$post->view}}</span></li>
                                        <li>
                                            <div class="main-border-button">
                                                <a href="{{route('BrowseOne', $post)}}">Browse</a>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- ***** Gaming Library End ***** -->
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to do this action?`,
                text: "If you want to do this, please click OK.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>

@endsection
