<div class="container fList">
    <div class="row">
        {{-- Form Creazione Articolo --}}
        <div class="div col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" wire:submit.prevent="createArticle">
                        @csrf
                        <div class="form-floating mb-3">
                            <input autocomplete="additional-name" type="text" class=" form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="" wire:model="name" >
                            <label for="name" class="form-label">{{__('ui.nomearticolo')}}</label>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class=" form-control @error('price') is-invalid @enderror" id="price" placeholder="price" wire:model="price" step="0.01">
                            <label for="price" class="form-label "> {{__('ui.price')}}</label>
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select wire:model.live="category" id="category" class=" form-select @error('category') is-invalid @enderror" >
                                <option value="">{{__('ui.selezionacategoria')}}</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{__("ui.$category->name") }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <textarea class=" form-control @error('description') is-invalid @enderror" name="" id="description" cols="30" rows="4" wire:model="description"  placeholder="{{__('ui.description')}}"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="my-3">
                            <input wire:model="temporary_images" id="image" type="file" name="images" multiple class="form-control  @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                            @error('temporary_images.*')
                            <p class="text-danger mt-2">{{$message}}</p>
                            @enderror
                        </div>
                        <div class=" mt-5 mb-2 d-flex align-items-center">
                            <x-btncstm inner="{{__('ui.send')}}"/>
                            <x-loader/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Preview Immagine --}}
        <div class="col-12 col-md-6">
                @if (!empty($images))
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p>Photo previews:</p>
                            <div class="row border rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                <div class="col my-3">
                                    <x-loader/>
                                    <div class="img-preview mx-auto" style="background-image: url({{$image->temporaryUrl()}})"></div>
                                    <button type="button" class="btn d-block text-center mx-auto" wire:click="removeImage({{$key}})"><i class="fa-solid fa-trash-can fa-xl" style="color:darkred;"></i></button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        </div>
    </div>
</div>
