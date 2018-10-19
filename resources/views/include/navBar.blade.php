

    <!-- CSRF Token -->


    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

<div id="app">
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="#">
                    WikiCars
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class=" nav navbar-nav">

                    <li> <a href="http://127.0.0.1:8000/">Home</a></li>
                    <li><a href="http://127.0.0.1:8000/Information">Feed </a></li>
                    {{--@can('subscriber_only',Auth::user())--}}
                        <li><a href="/subscriber">myGallary</a></li>
                        <li><a href="/edit">Create Section</a></li>
                    <li><a href="/AdminPanel">Admin Panel</a></li>



                    {{--@endcan--}}
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="/admin/login">Login as admin</a></li>

                            <li><a href="{{ route('login') }}">Login</a></li>

                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else

                            {{--<a href="{{ route('user.show',$user->id) }}">--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{url('/profile')}}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
            </div>

        </div>
    </nav>


</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>


