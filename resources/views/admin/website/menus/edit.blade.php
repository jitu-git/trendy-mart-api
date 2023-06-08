@extends('layouts.admin')

@section("css")
    @include("partial.admin.css", ["page" => "bootstrap-select"])
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
        {!! Form::model($data, ['route' => [$routes["update"], $data->id], "class" => "kt-form", "method" => "PUT", "files" =>  true]) !!}
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                <div class="kt-portlet__head kt-portlet__head--lg" style="">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Update {{$title}}</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            {{ Form::label("parent_id", "Parent *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-9">
                                                {{ Form::select('parent_id', ["0" => "--Root--" ] + $menu, null, ["class" => "form-control" ,"id" => "parent", "data-live-search" => "true"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("title", "Title *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-9">
                                                {{ Form::text('title', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("title", "Hindi Title *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-9">
                                                {{ Form::text('hi_title', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("icon", "Icon *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-9">
                                                {{ Form::file('file', ["class" => "custom-file-input"]) }}
                                                <label class="custom-file-label" for="customFile" style="text-align:left">Choose file</label>
                                            </div>
                                            @if($data->icon)
                                                {{ Form::hidden('old_file',$data->banner) }}

                                                <div class="form-group" style="margin-top: 20px;">
                                                    <img src="{{ asset("storage/{$data->icon}") }}" style="max-width: 100%;max-height: 100%;display: block;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div>

                <div class="kt-portlet__foot">
                    <div class="kt-form__actions" align="right">
                        <a href="{{ route($routes["index"]) }}" class="btn btn-secondary">Cancel</a>
                        {{ Form::submit("Submit", ["class" => "btn btn-primary"]) }}

                    </div>
                </div>

            </div>

            <!--end::Portlet-->
        {!! Form::close() !!}
        </div>
    </div>
@endsection


@section("scripts")
    @include("partial.admin.js", ["page" => "bootstrap-select"])
    <script type="text/javascript">

        function action(val) {
            $('.link').hide();
            $(`#link_${val}`).show();
        }

        $(document).ready(function () {

            $("#page").selectpicker({
                "placeholder": "Choose any page for this menu"
            });

            $("#parent").selectpicker({
                "placeholder": "Choose parent"
            });

            $(".link_chooser").click(function () {
                var val = $(this).val();
                action(val);

            });

        });

        action('{{ $data->link_type }}')
    </script>
@endsection
