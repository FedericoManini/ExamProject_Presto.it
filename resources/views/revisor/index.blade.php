<x-layout>
    {{-- Intestazione --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-6">
                    @if ($article_to_check) {{__('ui.AnnunciodaRevisionare')}} @else {{__('ui.NessunAnnunciodaRevisionare')}}
                    @endif
                </h1>
            </div>
        </div>
    </div>

    {{-- Sezione controllo Articoli --}}
    @if ($article_to_check)
    <div class="container">
        <div class="row">
            {{-- Foto dell'Item da Controllare --}}
            <div class="col-12 col-md-6">
                <div id="revisorCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($article_to_check->images as $el)
                        <div class="carousel-item border borde-1 @if($loop->first) active @endif" style="max-height: 90vh;">
                            <div style="background: url({{$el->getUrl(400,400)}}); background-size:contain; background-repeat: no-repeat; background-position:center; height: 50vh; width: 100%;"></div>
                            <div class="ps-5 pt-3" style="height: 70vh; width: 100%;">
                                <p>Adult: <span class="{{$el->adult}}"></span></p>
                                <p>Spoof: <span class="{{$el->spoof}}"></span></p>
                                <p>Medical: <span class="{{$el->medical}}"></span></p>
                                <p>Violence: <span class="{{$el->violence}}"></span></p>
                                <p>Racy: <span class="{{$el->racy}}"></span></p>
                                @if($el->labels)
                                <p>Tags:
                                    @foreach ($el->labels as $label)
                                        <span class="d-inline">#{{$label}} </span>
                                    @endforeach
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if ($article_to_check->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#revisorCarousel" data-bs-slide="prev">
                        {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                        <span aria-hidden="true"><i class="fa-solid fa-2xl fa-chevron-left" style="color: black"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#revisorCarousel" data-bs-slide="next">
                        {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                        <span  aria-hidden="true"><i class="fa-solid fa-2xl fa-chevron-right" style="color: black"></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
            </div>
            {{-- Dati Elemento da controllare --}}
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p><small>{{__('ui.Item')}}: </small>{{ $article_to_check->name }}</p>
                        <p><small>{{__('ui.Createdby')}}: </small>{{ $article_to_check->user->name }}</p>
                        <p><small>{{__('ui.date')}}: </small>{{ $article_to_check->created_at->format("d/m/Y - h:i") }}</p>
                        <p><small>{{__('ui.price')}}: </small>{{$article_to_check->price}} €</p>
                            <p><small>{{__('ui.description')}} : </small>{{ $article_to_check->description }}</p>
                            <div class="d-flex justify-content-evenly ">
                                <form action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <x-btnconfirm/>
                                </form>
                                <form action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <x-btndelete/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- tabella con elementi accettati o meno --}}
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <hr>
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ui.accepteditem')}}</th>
                                <th scope="col">{{__('ui.price')}}</th>
                                <th scope="col">{{__('ui.author')}}</th>
                                <th scope="col">{{__('ui.review')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($article_checked as $article)
                            <tr>
                                <th scope="row"><a href="{{route('article.show', compact('article'))}}">{{$article->name}}</a></th>
                                <td>{{$article->price}}€</td>
                                <td>{{$article->user->name}}</td>
                                <td>
                                    <form action="{{ route('revisor.reject_article', ['article' => $article]) }}"
                                        method="post">
                                        @csrf
                                        @method('PATCH')
                                        <x-btndelete/>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>

                </div>

                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{__('ui.discardeditem')}}</th>
                                <th scope="col">{{__('ui.price')}}</th>
                                <th scope="col">{{__('ui.author')}}</th>
                                <th scope="col">{{__('ui.review')}}</th>
                            </tr>
                        </thead>
                        <tbody class="table-danger">
                            @foreach ($article_not_checked as $article)
                            <tr>
                                <th scope="row"><a href="{{route('article.show', compact('article'))}}">{{$article->name}}</a></th>
                                <td>{{$article->price}}€</td>
                                <td>{{$article->user->name}}</td>
                                <td><form action="{{ route('revisor.accept_article', ['article' => $article]) }}"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <x-btnconfirm/>
                                    {{-- <button class="btn btn-success" type="submit">Accetta</button> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
            </div>

        </div>
    </div>
</x-layout>
