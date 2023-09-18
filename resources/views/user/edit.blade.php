@extends('layout.master')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
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
                                                        <form action="{{route('UpdateUser', $user)}}" method="post">
                                                            @csrf
                                                            <div class="input-group mt-3">
                                                                <label for="name"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Name</label>
                                                                <input name="name" type="text"
                                                                       class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                                       id="username" value="{{$user->name}}" required>
                                                                <br>
                                                                @error('name')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="email"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Email</label>
                                                                <input name="email" type="email"
                                                                       class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                                       id="username" value="{{$user->email}}" required>
                                                                <br>
                                                                @error('email')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <p>If you want to change the password, enter the
                                                                    previous password and then enter the new password
                                                                    twice.</p>
                                                                <label for="first_password"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">First Password</label>
                                                                <input name="first_password" type="password"
                                                                       class="form-control validate" id="password"
                                                                       placeholder="****" >
                                                                <br>
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="new_password"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">New Password</label>
                                                                <input name="new_password" type="password"
                                                                       class="form-control validate" id="password"
                                                                       placeholder="****" required>
                                                                <br>
                                                                @error('new_password')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="new_re_password"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">New Re-Password</label>
                                                                <input name="new_re_password" type="password"
                                                                       class="form-control validate"
                                                                       id="password"
                                                                       placeholder="****" required>
                                                                <br>
                                                                @error('pswd_error')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <button type="submit"
                                                                        class="main-border-button btn btn-primary d-inline-block mx-auto">
                                                                    Edit
                                                                </button>
                                                            </div>
                                                        </form>
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
