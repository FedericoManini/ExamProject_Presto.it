<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <h5 class="display-6">{{$user->name}}</h5>
                <ul>
                    <li>{{$user->email}}</li>
                    <li>{{$articles->where('is_accepted', true)->count()}} Articoli pubblicati</li>
                    <li>{{$articles->whereNull('is_accepted')->count()}} Articoli in fase di revisione</li>
                </ul>
            </div>
            <div class="col-md-4 col-12">
                <h5 class="display-6">Articoli Pubblicati</h5>

                    @forelse ($articles->where('is_accepted', true) as $article)
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('article.show', compact('article'))}}">{{$article->name}}</a>
                    <form action="{{ route('destroy_article', ['article' => $article]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <x-btndelete/>
                    </form>
                    </div>
                    <hr>
                    @empty
                    <div class="py-1 my-2">
                        <p>Sembra che tu non abbia ancora pubblicato alcun articolo. Vuoi pubblicarne uno?</p>
                        <x-anchor inner="Inserisci annuncio" href="{{route('article.create')}}"/>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </x-layout>