<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            {{-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('user.categories')}}">Categories</a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    categories
                </a>
                <ul class="dropdown-menu dropdown-menu">
                    @foreach ($categories as $item)
                        <li><a class="dropdown-item" href="{{route('user.spacial_food',$item->id)}}">{{$item->title}}</a></li>
                    @endforeach
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('user.categories')}}">all categories</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('user.foods')}}">foods</a>
            </li>
            <li class="nav-item">
                {{-- @if (auth()->check())
                    <button>hhh</button>
                @else
                    <button>jj</button>
                @endif --}}
            </li>
            @if (auth()->check())
                @if (auth()->user()->role == 0 )
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('add_order.index')}}">my orders</a>
                    </li>
                @endif
            @endif
            @if (!auth()->check() || auth()->user()->role == 0)    
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('message')}}">messages</a>
                </li>
            @endif
            <li class="nav-item dropdown">
            @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @if (Auth::user()->role==1)
                            <a class="dropdown-item" href="{{ url('/admin') }}">
                                admin panel
                            </a>
                        @endif
                    </div>
                </li>
            @endguest
            <form class="d-flex" role="search" method="GET" action="{{route('user.search_foods')}}">
                {{ csrf_field() }}
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    </div>
</nav>
