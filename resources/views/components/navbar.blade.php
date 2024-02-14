<nav class="navbar navbar-expand-lg fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Presto.it</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">{{__('ui.indice')}}</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{__('ui.categoria')}}
                </a>
            <ul class="dropdown-menu" >
                @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">{{__("ui.$category->name") }}</a>
                </li>
                @endforeach
            </ul>
            </li>

            @guest
            <li class="nav-item">
            <button class="nav-link" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions"
            aria-controls="offcanvasWithBothOptions">Login</button>
            </li>
            <li class="nav-item">
            <button class="nav-link" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions2"
            aria-controls="offcanvasWithBothOptions2">Register</button>
            </li>
            @endguest

            @auth
            <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="nav-link">Logout</button>
            </form>
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('article.create') }}">{{__('ui.inserisciAnnuncio')}}</a>
            </li>
            @if (Auth::user()->is_revisor)
            <li class="nav-item">

                @if (App\Models\Article::toBeRevisionedCount() > 0)
                <a class="nav-link fRevisorCount" aria-current="page" href="{{ route('revisor.index') }}">{{__('ui.zonarevisor')}}
                </a>
                @else
                <a class="nav-link" aria-current="page" href="{{ route('revisor.index') }}">{{__('ui.zonarevisor')}}
                </a>
                @endif

            </li>
            @endif
            @endauth
        </ul>

        <li class="nav-link">
            <x-_locale lang="it"/>
        </li>
        <li class="nav-link">
            <x-_locale lang="en"/>
        </li>
        <li class="nav-link">
            <x-_locale lang="es"/>
        </li>

        <form class="d-flex" role="search" action="{{route('article.search')}}" method="get">
            <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
            {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            <x-btncstm inner="{{__('ui.search')}}"/>
        </form>

    </div>
</div>
</nav>
@guest

{{-- LOGIN FORM --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
aria-labelledby="offcanvasWithBothOptionsLabel">
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Login</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input name="email" type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>

        <div class="mb-3">
            <input name="remember" class="form-check-input" type="checkbox" value="1" checked>
            <label class="form-checkbox">Remember me</label>
        </div>


        <button type="submit" class="btn btn-primary">Login</button>

    </form>

</div>
</div>


{{-- REGISTER FORM --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions2"
aria-labelledby="offcanvasWithBothOptions2Label">
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptions2Label">Register</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input name="email" type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>
</div>


@endguest
