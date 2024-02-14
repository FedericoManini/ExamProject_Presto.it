<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? 'Presto.it'}}</title>
    <link rel="website icon" type="png" href="/img/prestoOr.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-navbar2/>
    <x-progressbar/>
    <x-header/>
    @if ($errors->any())
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-4">
                <div class="alertd-flex justify-content-center align-items-center">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger p-4">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (session('message'))
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-6">
                <div class="alert d-flex justify-content-center align-items-center">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success p-4">{{session('message')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{$slot}}
    <button id="scrollToTopBtn"><i class="fa-solid fa-circle-chevron-up"></i></button>
    <x-footer/>
    <!-- script Fontawesome -->
    <script src="https://kit.fontawesome.com/00f112adea.js" crossorigin="anonymous"></script>
    {{-- script Gsap --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
</body>

</html>