<x-layout>
    <div class="container">
        <div class="row">
            <h4 class="display-3 my-5 d-flex justify-content-center align-items-center">{{__("ui.allarticles") }}</h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4 mt-2">
                <div class="row">
                    <div class="col-8 d-none d-md-block mx-5">
                        @foreach ($categories as $category)
                        <div class="ag-category_item">
                            <div href="#" class="ag-category-item_link">
                                <div class="ag-category-item_bg"></div>
                                <div class="ag-category-item_title text-center">
                                    <a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{__("ui.$category->name") }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="row">
                    @forelse ($articles as $article)

                    <div id="fCardHome" class="col-12 col-md-4 my-3 d-flex justify-content-center align-items-center">
                        <div id="fCardHomeInner" class="card" style="width: 18rem;">
                            <img src="{{!$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400,400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{$article->name}}</h4>
                                {{-- <p class="d-flex justify-content-end ">
                                    <span class="fw-custom display-4">
                                        {{floor($article->price)}}
                                    </span>
                                    <span class="pt-2">
                                        ,{{floor(($article->price - floor($article->price))*100)}} €
                                    </span>
                                </p> --}}
                                <x-priceFormat price="{{$article->price}}" />
                                <p>{{__('ui.inserimento')}} {{$article->user->name}}</p>
                                <p class="card-text"><small class="text-body-secondary">{{__('ui.' . $article->category->name)}}</small></p>
                                <x-anchor href="{{route('article.show', compact('article'))}}" inner="{{__('ui.dettaglioBottone')}}"/>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="container">
                        <div class="row justify-content-center align-items-center my-3">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <div class="col-12 d-flex justify-content-center align-items-start flex-column">
                                    <span class="display-6 my-5">Non ci sono ancora articoli! Vuoi inserirne uno?</span>
                                    <x-anchor inner="Inserisci articolo" href="{{route('article.create')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <div class="col-6 m-5">
                    {{$articles->links()}}
                </div>

                </div>
            </div>

        </div>
        </div>
    </div>


</x-layout>
