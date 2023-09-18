<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                        <form id="search" action="#">
                            <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                   onkeypress="handle"/>
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('Home')}}"
                               class="{{ Route::currentRouteName() === 'Home' ? 'active' : ''}}">Home</a></li>
                        <li><a href="{{route('Browse')}}"
                               class="{{ Route::currentRouteName() === 'Browse' ? 'active' : ''}}">Browse</a></li>
                        @auth()
                            <li><a href="{{route('CreatePost')}}"
                                   class="{{ Route::currentRouteName() === 'CreatePost' ? 'active' : ''}}">+ Post</a></li>
                        @else
                            <li><a href="{{route('Login')}}">Login</a></li>
                        @endauth
                        @auth
                            <li><a href="{{route('Profile', ['user'=>Auth::user()])}}">Profile <img
                                        src="{{asset('assets/images/profile-header.jpg')}}" alt=""></a></li>
                        @else
                            <li><a href="{{route('Register')}}">Sign up <img
                                        src="{{asset('assets/images/profile-header.jpg')}}" alt=""></a></li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
