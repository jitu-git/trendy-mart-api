<div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
    <div class="kt-portlet__head kt-portlet__head--lg" style="">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{$title}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">

        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col-xl-8">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="kt-portlet__foot">
        <div class="kt-form__actions" align="right">
            <a href="{{ $cancel }}" class="btn btn-secondary">Cancel</a>
            {{ Form::submit("Submit", ["class" => "btn btn-primary"]) }}

        </div>
    </div>

</div>