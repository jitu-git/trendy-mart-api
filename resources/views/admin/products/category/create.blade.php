@extends('layouts.admin')

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
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                {{ Form::label("parent_id", "Parent *", ["class" => "col-3 col-form-label"]) }}
                                                <div class="col-9">
                                                    {{ Form::select('parent_id', ["0" => "--Root--" ] + $categories, null, ["class" => "form-control" ,"id" => "parent", "data-live-search" => "true"]) }}
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                {{ Form::label("name", "Name *", ["class" => "col-3 col-form-label"]) }}
                                                <div class="col-9">
                                                    {{ Form::text('name', null, ["class" => "form-control"]) }}
                                                </div>
    
                                            </div>
                                            <div class="form-group row">
                                                {{ Form::label("image", "Image *", ["class" => "col-3 col-form-label"]) }}
                                                <div class="col-9">
                                                    {{ Form::file('file', ["class" => "form-control custom-file-input"]) }}
                                                    <label class="custom-file-label" for="customFile" style="text-align:left">Choose file</label>
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
    @include("partial.admin.js", ["page" => "bootstrap-select"])
    <script type="text/javascript">
        $(document).ready(function () {
            $("#district_id").selectpicker();
        });
    </script>
@endsection