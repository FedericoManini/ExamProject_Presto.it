<x-layout>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{route('submit', compact('article'))}}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Your Email address</label>
                        <input type="email" class="form-control" value="{{Auth::user()->email ?? ''}}" name="email" required>
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lascia il tuo messaggio</label>
                        <textarea name="message" cols="30" rows="7" class="form-control" required placeholder="Ciao {{$article->user->name}}! Vorrei informazioni sull'articolo {{$article->name}}"></textarea>
                        @error('message')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <x-btncstm class="my-3" inner="{{__('ui.send')}}"/>
                </form>
            </div>
        </div>
    </div>
</x-layout>
