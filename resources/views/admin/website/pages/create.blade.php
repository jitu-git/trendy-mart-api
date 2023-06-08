@extends('layouts.admin')

@section("css")
    @include("partial.admin.css", ["page" => "select2"])
    @include("partial.admin.css", ["page" => "summernote"])
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
        {!! Form::open(['route' => $routes["store"], "class" => "kt-form", "files" => true]) !!}
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                <div class="kt-portlet__head kt-portlet__head--lg" style="">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add New {{$title}}</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">

                                        <div class="form-group row">
                                            {{ Form::label("name", "Name *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('name', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label("title", "Title *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('title', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label("slug", "Slug *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('slug', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("meta", "Meta *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::textarea('meta', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label("schema", "Schema", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::textarea('schema', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("short_code", "Short Code", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::select('short_code', get_all_short_code(), null, ["class" => "form-control", "placeholder" => "Choose Shortcode", "id" => "short_code"]) }}
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            {{ Form::label("description", "Description *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::textarea('description', null, ["class" => "form-control description"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("hi_description", "Description (Hindi) *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::textarea('hi_description', null, ["class" => "form-control description"]) }}
                                            </div>
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
    @include("partial.admin.js", ["page" => "summernote"])
    <script type="text/javascript">
        $(document).ready(function () {

            $('.description').summernote({
                height: 300
            });

            $("#short_code").change(function (e) {
                if(e.target.value){
                    $('.description').summernote('insertText', e.target.selectedOptions[0].innerText);
                }
            })
        });
    </script>
@endsection
