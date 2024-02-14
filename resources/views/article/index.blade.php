<x-layout>
    <div class="container">
        <div class="row">
            @forelse ($articles as $article)
            <div id="fCardHome" class="col-12 col-md-4 my-3 d-flex justify-content-center align-items-center">
                <div id="fCardHomeInner" class="card" style="width: 18rem;">
                    <img src="{{!$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400,400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$article->name}}</h4>
                        <p class="d-flex justify-content-end ">
                            <span class="fw-custom display-4">
                                {{floor($article->price)}}
                            </span>
                            <span class="pt-2">
                                ,{{floor(($article->price - floor($article->price))*100)}} €
                            </span>
                        </p>
                        <p>insert by: {{$article->user->name}}</p>
                        <p class="card-text"><small class="text-body-secondary">{{$article->category->name}}</small></p>
                        <x-anchor href="{{route('article.show', compact('article'))}}" inner="Dettagli"/>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="display-6">Articolo non presente</p>
            </div>
            @endforelse
        </div>
    </div>
{{$articles->links()}}

</x-layout>