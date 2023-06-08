@extends('layouts.admin')

@section('content')

  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand {{ icon("shortcode") }}"></i>
                </span>
        <h3 class="kt-portlet__head-title">
          {{ $controller }} comments
        </h3>
      </div>

    </div>

    <div class="kt-portlet__body kt-portlet__body--fit">
        <x-alert/>
        {!! Form::open(['route' =>[$routes["comments"], $request->id], "class" => "kt-form", "files" => true]) !!}
            <!--begin::Portlet-->
            <x-form-container title="Add comments" cancel="#">
                <x-form :class="$form" />
            </x-form-container>
            <!--end::Portlet-->
        {!! Form::close() !!}


      <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Lead Timeline
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <div class="kt-timeline-v3">

                @if ($request->comments)
                    @foreach($request->comments as $comment)
                      <div class="kt-timeline-v3__items">
                        <div class="kt-timeline-v3__item kt-timeline-v3__item--info">
                            <span class="kt-timeline-v3__item-time">{{ date_modified($comment->created_at, "Y-m-d-H:i") }}</span>
                            <div class="kt-timeline-v3__item-desc" style="padding-left: 14rem">
                                <span class="kt-timeline-v3__item-text">
                                    {{ $comment->comment }}
                                </span>
                                <br>
                                <span class="kt-timeline-v3__item-user-name">
                                    <a href="#" class="kt-link kt-link--dark kt-timeline-v3__item-link">
                                      {{ $comment->user->name }} 
                                    </a>
                                  </span>
                            </div>
                        </div>
                      </div>
                    @endforeach
                @endif
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
