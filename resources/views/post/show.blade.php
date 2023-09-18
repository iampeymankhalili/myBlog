@extends('layout.master')


@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>You choose post </em> {{$post->id}} </h4>
                            </div>
                            <div class="row">
                                <!-- ***** Details Start ***** -->
                                <div class="game-details">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h2>Post {{$post->id}}</h2>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="left-info">
                                                            <div class="left">
                                                                <h4>{{$post->title}}</h4>
                                                                <span>Date</span>
                                                            </div>
                                                            <ul>
                                                                <li><i class="fa fa-eye"></i> {{$post->view}}</li>
                                                                <li>
                                                                    <i class="fa fa-calendar "></i> {{$post->created_at->diffForHumans()}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="right-info">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa fa-clock"></i> {{$post->created_at->format('H:i:s')}}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-calendar-day"></i> {{ $post->created_at->format('d') }}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-calendar-week"></i> {{ $post->created_at->format('F') }}
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-calendar-times"></i> {{ $post->created_at->format('Y') }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <img src="{{asset('images/' . $post->pic_address)}}" alt=""
                                                             style="border-radius: 23px; margin-bottom: 30px;">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="left-info">
                                                            <p> {{$post->text}} </p>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="col-lg-6">
                                                        <div class="left-info">
                                                            <p>
                                                                This post was written by {{$user->name}}.
                                                                <br>You can see All of {{$user->name}}'s Post by
                                                                clicking
                                                                <a href="{{route('UserPost', $user)}}">here</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @auth
                                            @if(Auth::user()->id === $post->user_id)
                                                <div class="main-border-button col-lg-2">
                                                    <a href="{{route('EditPost', $post)}}">Edit</a>
                                                </div>
                                                <div class="main-border-button">
                                                    <form method="POST" action="{{ route('DeletePost', $post) }}">
                                                        @csrf
                                                        <input name="delete" type="hidden" value="DELETE">
                                                        <button type="submit"
                                                                class="btn btn-xs btn-danger btn-flat show_confirm"
                                                                data-toggle="tooltip" title='Delete'>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                                <!-- ***** Details End ***** -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Most Popular End ***** -->
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
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
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

