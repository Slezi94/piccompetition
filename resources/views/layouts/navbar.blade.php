<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        @guest
            <a class="navbar-brand" href="{{ url('/') }}">
                Picture competition
            </a>
        @else
            <a class="navbar-brand" href="{{ url('home') }}">
                Picture competition
            </a>
        @endguest
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown row d-flex align-items-center"> 
                        @if(Auth::user()->super_admin)
                            <span id="createComp">
                                <a class="nav-link justify-content-center" href="{{ route('competition.create',Auth::user()->id) }}" role="button">+</a>
                            </span>

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                        @else
                            <span id="createComp">
                                <a class="nav-link justify-content-center" href="{{ route('picture.create',Auth::user()->id) }}" role="button">+</a>
                            </span>

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                        @endif

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>

                        {{-- <a class="nav-link" href="{{ route('home') }}">Home</a> --}}
                        <div class="mt-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf 
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>