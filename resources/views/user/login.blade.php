@extends('layout.master')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                @include('flash_message')
                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- ***** Details Start ***** -->
                                <div class="game-details">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form action="{{route('Signin')}}" method="post">
                                                            @csrf
                                                            <div class="input-group mt-3">
                                                                <label for="email"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Email</label>
                                                                <input name="email" type="email"
                                                                       class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                                       id="username" placeholder="email" required>
                                                                <br>
                                                                @error('email')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="password"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Password</label>
                                                                <input name="password" type="password"
                                                                       class="form-control validate" id="password"
                                                                       placeholder="****" required>
                                                                <br>
                                                                @error('password')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <button type="submit"
                                                                        class="main-border-button btn btn-primary d-inline-block mx-auto">
                                                                    Login
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <div class="input-group mt-3">
                                                            <p><em>Do not have an account? <a
                                                                        href="{{route('Register')}}"> Sign
                                                                        up </a> please</em></p>
                                                        </div>
                                                        <div class="input-group mt-3">
                                                            <p><em>Back to<a href="{{route('Home')}}">
                                                                        Home </a>page</em></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

@endsection
