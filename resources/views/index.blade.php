@extends('layout.master')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                @include('flash_message')
                <!-- ***** Banner Start ***** -->
                <div class="main-banner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="header-text">
                                <h6>Welcome To Blog</h6>
                                <h4><em>Browse</em> ALL Posts Here</h4>
                                <div class="main-button">
                                    <a href="{{route('Browse')}}">Browse Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Banner End ***** -->

                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Most Popular</em> Right Now</h4>
                            </div>
                            <div class="row">
                                @foreach($posts as $post)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="assets/images/popular-01.jpg" alt="">
                                            <h4>{{$post->title}}<br><span>Date</span></h4>
                                            <ul>
                                                <li><i class="fa fa-eye"></i> {{$post->view}}</li>
                                                <li>
                                                    <i class="fa fa-calendar "></i> {{$post->created_at->diffForHumans()}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="{{route('Popular')}}">Discover Popular</a>
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
