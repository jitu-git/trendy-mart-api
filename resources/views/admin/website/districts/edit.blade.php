@extends('layouts.admin')

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
                            <div class="col-xl-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">

                                        <div class="form-group row">
                                            {{ Form::label("name", "Name *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('city_name', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label("name", "Hindi Name *", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('hi_city_name', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            {{ Form::label("secretary_name", "Secretary Name", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('secretary_name', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            {{ Form::label("personal_mobile_no", "Personal mobile no", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('personal_mobile_no', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("official_mobile_no", "Official mobile no", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('official_mobile_no', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("landline", "Landline", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('landline', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("residence_no", "Residence no", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('residence_no', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("helpline_no", "Helpline no", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('helpline_no', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("mail_id", "Email id", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('mail_id', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("sp_email", "SP Email", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('sp_email', null, ["class" => "form-control"]) }}
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label("cr_email", "Control Room Email", ["class" => "col-3 col-form-label"]) }}
                                            <div class="col-10">
                                                {{ Form::text('cr_email', null, ["class" => "form-control"]) }}
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
    @include("partial.admin.js", ["page" => "select2"])
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
