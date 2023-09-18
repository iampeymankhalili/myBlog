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
                                                        <form action="{{route('UpdatePost', $post)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="input-group mt-3">
                                                                <label for="title"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Title</label>
                                                                <input name="title" type="text"
                                                                       class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                                       id="username" value="{{$post->title}}" required>
                                                                <br>
                                                                @error('title')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="text"
                                                                       class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"
                                                                       style="color: #F99;">Text</label>

                                                                <textarea name="text" id="" cols="30"
                                                                          class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7"
                                                                          id="username"
                                                                          rows="10">{{$post->text}}</textarea>
                                                                <br>
                                                                @error('text')
                                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                                @enderror
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <input type="hidden" name="user_id"
                                                                       value="{{ Auth::user()->id }}">
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <input type="hidden" name="view" value={{$post->view}}>
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <label for="pic_address"
                                                                       style="color: #F99;">Picture</label>
                                                                <img style="max-width: 60px;" src="{{asset('images/' . $post->pic_address)}}"/>
                                                                <input type="file" value="{{asset('images/' . $post->pic_address)}}" name="pic_address"
                                                                       id="example-fileinput"
                                                                       class="main-border-button btn btn-primary d-inline-block mx-auto"
                                                                       onchange="previewFile(this)" multiple>
                                                                <img id="previewImg" alt="photo"
                                                                     style="max-width: 130px; margin-top: 20px;">

                                                                @error('pic_address')
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
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $('#previewImg').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
