@if ($errors->any())
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-icon">
            @if(\Illuminate\Support\Str::contains(current_route(), "admin"))
                <i class="flaticon-warning"></i>
            @else
                <i class="las la-exclamation-triangle"></i>
            @endif
             </div>

        @foreach ($errors->all() as $error)
            <div class="alert-text">{{ $error }}</div>
        @endforeach

        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if(session()->has("success"))
    <div class="alert alert-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
        <div class="alert-text">{{ session("success") }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif


@if(session()->has("error"))
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">{{ session("error") }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif
