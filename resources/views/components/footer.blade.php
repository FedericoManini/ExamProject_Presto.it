<div class="b-example-divider"></div>

<div class="container-fluid bg-footer position-relative d-flex justify-content-center">
  <div class="container position-absolute bottom-0">

    <footer class="row">

        <div class="col-6 col-md-3">
          <h5>{{__('ui.AboutPresto')}}</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2 fs-small"><a href="#" class="nav-link p-0 text-body-secondary">{{__('ui.informazioni')}}</a></li>
            <li class="nav-item mb-2 fs-small"><a href="{{route("article.create")}}" class="nav-link p-0 text-body-secondary">{{__('ui.pubblica')}}</a></li>
            <li class="nav-item mb-2 fs-small"><a href="#" class="nav-link p-0 text-body-secondary">{{__('ui.pagamento')}}</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-3">
          <h5>{{__('ui.contattaci')}}</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><i class="fa-solid fa-location-dot pe-2"></i> Bari, Italy, EU</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><i class="fa-solid fa-phone pe-1"></i> 080-4550123</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary"><i class="fa-solid fa-envelope pe-1"></i> Presto@aulab.it</a></li>
          </ul>
        </div>

        <div class="col-md-5">
          @auth
            @if( Auth::user()->is_revisor)
            <h5>{{__('ui.Congratulazioni')}}   </h5>
            <p>{{__('ui.team')}}   </p>
            @else
            <form>
              <h5>{{__('ui.Guadagnaconpresto')}} </h5>
              <p class="fs-small">{{__('ui.lavoraconnoi')}}</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <x-anchor href="{{route('become.revisor')}}" inner="{{__('ui.sendrequest')}}" />
              </div>
            </form>
            @endif
          @endauth

          @guest
            <form>
            <h5>{{__('ui.Guadagnaconpresto')}} </h5>
            <p class="fs-small">{{__('ui.lavoraconnoi')}}</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <x-anchor href="{{route('become.revisor')}}" inner="Send request"/>
            </div>
          </form>
          @endguest

        </div>
      </footer>
      {{-- Company --}}
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; 2024 Aulab Company, Gruppo Qwerty</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-facebook"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-instagram"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
    </div>

  </div>
</div>
