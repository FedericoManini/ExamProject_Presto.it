<div class="container-fluid">
    <div id="bgHeader" class="row py-5">
        <div class="col-6 d-flex justify-content-end align-items-center">
            <img id="fHeaderLogo" src="/img/prestoOr.png" alt="" class="rounded-circle d-none d-lg-block" width="150" height="150">
            <h4 id="titleHeader" class="display-3 py-5">{{__('ui.questoè')}}</h4>
        </div>
        <div class="col-6 d-flex align-items-center ">
            <h4 id="fInnerTitle1" class="display-3">Fast</h4>
            <h4 id="fInnerTitle2" class="display-3">Secure</h4>
            <h4 id="fInnerTitle3" class="display-3">Garantee</h4>
            <h4 id="fInnerTitle4" class="display-3">PRESTO.IT</h4>
        </div>
    </div>
</div>

@if (Route::currentRouteName() == 'home')
<div class="container">
    <div class="row my-2">
        <div class="col-12">
            <h5 class="display-5 fDisplayRoute my-5">
                @auth
                {{__('ui.bentornato')}} {{Auth::user()->name}}!
                @endauth
                @guest
                {{__('ui.inizio')}}
                @endguest
            </h5>
        </div>
    </div>
</div>
@endif