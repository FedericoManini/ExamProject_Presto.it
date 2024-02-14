{{-- <p class="d-flex">
    <span class="fw-custom display-4">
        {{intval($price)}}
    </span>
    <span class="pt-2">
        @if (($price*100)%10 < 10)
        0{{($price*100)%10}} €
        @else
        {{($price*100)%10}} €
        @endif
    </span>
</p> --}}

<p class="d-flex justify-content-end ">
    <span class="fw-custom display-4">
        {{floor($price)}}
    </span>
    <span class="pt-2">
        {{floor(($price - floor($price))*100)}} €
    </span>
</p>