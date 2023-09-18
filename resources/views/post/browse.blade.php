@extends('layout.master')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>ALL </em>POSTS</h4>
                            </div>
                            <div class="row">
                                <!-- ***** Details Start ***** -->
                                <div class="game-details">
                                    <div class="row">
                                        @foreach($posts as $post)
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
                                                        <div class="col-lg-12">
                                                            <p> {{Str::words($post->text , 10, '...')}} </p>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="main-border-button">
                                                                <a href="{{route('BrowseOne', $post)}}">See Complete Now!</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- ***** Details End ***** -->

                                <div class="col-lg-12">
                                    <div class=" main-info header-text ">
                                        {{$posts->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Most Popular End ***** -->
            </div>
        </div>
    </div>

@endsection
