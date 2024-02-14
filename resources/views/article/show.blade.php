<x-layout>
    <div class="container">
        <div class="row my-3 justify-content-between">
            {{-- hover immagini --}}
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12" id="">
                        <img id="bigPicture" src="{{!$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400, 400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}}" alt="">
                    </div>
                    <div id="previews" class="col-12 d-flex justify-content-center">
                        {{-- riempito in Js --}}
                        @foreach ($article->images as $image)
                            <img src="{{!$image->get()->isEmpty() ? $image->getUrl(400, 400) : "https://cdn2.toro.com/en/-/media/Images/Toro/B2C/image-not-found-medium.ashx"}}" class="preview" alt="">
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- descrizione card --}}
            <div class="col-12 col-md-6 my-3">
                <h2>{{$article->name}}</h2>
                <span class="tw-custom">
                    {{__('ui.categoria')}}  :
                </span>
                <span>
                    {{__('ui.' . $article->category->name)}}
                </span>
                <hr>
                <p>{{__('ui.inserimento')}} {{$article->user->name}}</p>
                <hr>
                <x-priceFormat price="{{$article->price}}" />
                <hr>
                <p class="tw-custom mb-1">{{__('ui.description')}}:</p>
                <p class="ts-custom">{{$article->description}}</p>
                <p><x-anchor href="{{route('contact', compact('article'))}}" inner="Contatta il venditore"/></p>
            </div>

        </div>
    </div>
    <script>

    </script>
</x-layout>