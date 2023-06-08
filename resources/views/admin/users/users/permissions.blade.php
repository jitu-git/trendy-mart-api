@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
        {!! Form::model($data, ['route' => [$routes["permissions"], $data->id], "class" => "kt-form", "method" => "PUT", "files" =>  true]) !!}
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile">
                <div class="kt-portlet__head kt-portlet__head--lg" style="">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Update permissions for <strong>{{ $data->name }}</strong></h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">


                                        <div class="form-group row">
                                            <div class="col-9">
                                                @php
                                                $old_permissions = explode(",", $data->permission ? $data->permission->permissions : "");
                                                @endphp

                                                @if($permissions)
                                                    @foreach($permissions as $main_module => $permission)
                                                        <h3 class="kt-section__title">{{ $main_module }}</h3>
                                                        @foreach($permission as $module => $scopes)
                                                            <h6 class="kt-section__title">{{ $module }}</h6>
                                                            <div class="kt-checkbox-inline" style="margin-bottom:10px;">
                                                                @foreach($scopes as $scope)
                                                                    <label class="kt-checkbox kt-checkbox--brand">
                                                                        @php
                                                                            $sc = explode(",", $scope["scope"])
                                                                        @endphp
                                                                        {{ Form::checkbox("permissions[]", $scope["scope"], in_array($sc[0], $old_permissions) ) }}
                                                                         {{ $scope["title"] }}
                                                                        <span></span>
                                                                    </label>

                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                @endif
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