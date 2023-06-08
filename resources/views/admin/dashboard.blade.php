@extends('layouts.admin')


@section("content")
    <div class="datalisting">
        <div class="row">
            @if($modules)
                @foreach($modules as $module)
                    @if(is_permit($module["link"]))
                        <div class="col-lg-3">
                            <div class="kt-portlet kt-iconbox  kt-iconbox--animate-slow">
                                <div class="kt-iconbox__body">
                                    <div class="kt-iconbox__icon large_icon">
                                        <i class="{{ $module["icon"] }}" style="font-size:40px"></i>
                                    </div>
                                    <div class="kt-iconbox__desc">
                                        <h3 class="kt-iconbox__title">
                                            <a href="{{ route( $module["link"])  }}">{{ $module["title"] }}</a>
                                        </h3>
                                        <div class="kt-iconbox__content">
                                            {{ $module["count"] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            @endif
        </div>
    </div>
@endsection
