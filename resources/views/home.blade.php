<x-layout>
    {{-- Le categorie Genoveffa ordinate --}}
    <div class="container my-5">
        <div class="row">
            <h3 class="display-6 fList my-3">{{__('ui.scopri')}}</h3>
        </div>
        <div class="row fGenoveffaWrapper justify-content-center align-items-center">
            <div class="col-12">
                <div class="row justify-content-evenly align-items-center">
                    @foreach ($genoveffa as $category)
                        <div class="col-12 fGenoveffa fList m-3 p-0">
                            <div class="fGenoveffaCard">
                                <div class="fGenoveffaFront">
                                    <h5 class="m-4 display-6">{{__("ui.$category->name") }}</h5>
                                </div>
                                <div class="fGenoveffaBack">
                                    <x-anchor href="{{ route('categoryShow', compact('category')) }}" inner="Scopri i {{$category->articles->count()}} articoli"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <p class=" fList my-5"><small><a class="nav-link" href="{{ route('index') }}">{{__('ui.discoverothercategories')}} >> </a></small></p>
        </div>
    </div>
    {{-- Le 4 iconcine che piacciono tanto a Nico --}}
    <div class="container d-none d-lg-block">
        <div class="row my-5">
            <div class="col-12 my-4">
                <h4 id="fFadeAdv" class="display-6 fAdvantage">{{__('ui.ouradvantages')}}</h4>
            </div>
        </div>
        <div class="row d-flex justify-content-evenly my-4">
            <div class="col-3 fAdvantage my-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-center"><i class="fa-solid fa-truck-fast fa-2xl" style="color: var(--second);"></i></div>
                    <div class="col-8">
                        <h6 class="mt-2">{{__('ui.freeshipping')}}</h6>
                        <p style="opacity: .5">{{__('ui.freeshipping')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-3 fAdvantage my-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center align-items-center"><i class="fa-solid fa-shop fa-2xl" style="color: var(--second);"></i></div>
                    <div class="col-9">
                        <h6 class="mt-2">{{__('ui.garanzia')}}</h6>
                        <p style="opacity: .5">{{__('ui.garanzia')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-3 fAdvantage my-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center align-items-center"><i class="fa-solid fa-headset fa-2xl" style="color: var(--second);"></i></div>
                    <div class="col-9">
                        <h6 class="mt-2">{{__('ui.onlinesupport')}}</h6>
                        <p style="opacity: .5">{{__('ui.onlinesupport')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-3 fAdvantage my-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center align-items-center"><i class="fa-solid fa-credit-card fa-2xl" style="color: var(--second);"></i></div>
                    <div class="col-9">
                        <h6 class="mt-2">{{__('ui.securepayment')}}</h6>
                        <p style="opacity: .5">{{__('ui.securepayment')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Le card degli ultimi sei articoli pubblicati. Si vedono solo da Mobile --}}
    @if($articles->count()>0)
    <div class="container d-md-none d-block">
        <div class="row">
            <div class="col-12 my-4">
                <h4 id="fCardHome" class="display-6 fCardHome">{{__('ui.latestItems')}}</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
            <div id="fCardHome" class=" fCardHome col-12 col-md-4 my-3 d-flex justify-content-center align-items-center">
                <div id="fCardHomeInner" class="card" style="width: 18rem;">
                    <img src="{{!$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400,400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$article->name}}</h4>
                        <x-priceFormat price="{{$article->price}}"/>
                        <p>Insert by: {{$article->user->name}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{$article->category->name}}</small></p>
                        <x-anchor  href="{{route('article.show', compact('article'))}}" inner="Dettagli"/>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Il carosello con gli ultimi 6 articoli pubblicati. Si vedono solo da pc/schermi grandi --}}
    @if($articles->count()>0)
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-12 my-4">
                <h4 id="fCardHome" class=" fCardHome display-6 my-5">{{__('ui.latestItems')}}</h4>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-10">
                <div id="carouselExampleFade" class="carousel slide carousel-fade fCardHome">
                    <div class="carousel-inner">
                        @foreach ($articles as $article)

                        <div class="carousel-item @if($loop->first) active @endif">
                            <div class="fCarouselHome d-flex flex-column align-items-end justify-content-evenly " style="background-image:linear-gradient(120deg, transparent 40% , var(--vin)40%, var(--second)),url({{!$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400,400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}});">
                                <div class="fCarouselHomeInner col-5">
                                    <h4 class="card-title display-3 text-end">{{$article->name}}</h4>
                                    <x-priceFormat price="{{$article->price}}" />
                                    <p class=""><small>{{__('ui.inserimento')}}</small> {{$article->user->name}}</p>
                                    <p><small>{{__('ui.' . $article->category->name)}}</small></p>
                                    <x-anchor2 href="{{route('article.show', compact('article'))}}" inner="{{__('ui.dettaglioBottone')}}"/>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    {{-- <button id="canvasID" class="btn btn-warning">
                        button
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    @endif

</x-layout>
