<nav class="navbar fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="/img/prestoOr.png" alt="Presto.it" width="40" height="40"> Presto.it
        </a>
        <form class="d-md-flex d-none" role="search" action="{{route('article.search')}}" method="get">
            <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
            {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            <x-btncstm inner="{{__('ui.search')}}"/>
        </form>
        <a class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <span class="navbar-toggler-icon"></span>
        </a>
    </div>
</nav>


<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Presto.it</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <form class="d-flex d-md-none" role="search" action="{{route('article.search')}}" method="get">
            <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.search')}}" aria-label="Search">
            {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
            <x-btncstm inner="{{__('ui.search')}}"/>
            </form>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">{{__('ui.indice')}}</a>
            </li>

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endguest

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">{{__('ui.profile')}}</a>
            </li>

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
                <a class="nav-link fRevisorCount" aria-current="page" href="{{ route('revisor.index') }}">{{__('ui.zonarevisor')}}  <span class="fRedDot"> {{App\Models\Article::toBeRevisionedCount()}}</span>
                </a>
                @else

                <a class="nav-link" aria-current="page" href="{{ route('revisor.index') }}">{{__('ui.zonarevisor')}}
                </a>
                @endif

            </li>
            @endif
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-language"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item">
                        <x-_locale lang="it"/> Italiano
                    </li>
                    <li class="dropdown-item">
                        <x-_locale lang="en"/> English
                    </li>
                    <li class="dropdown-item">
                        <x-_locale lang="es"/> Espanol
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
