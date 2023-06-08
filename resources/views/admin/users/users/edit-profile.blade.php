@extends('layouts.admin')

@section("css")
    @include("partial.admin.css", ["page" => "bootstrap-select"])
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
        {!! Form::model($data, ['route' => ["admin.users.users.edit-profile", $data->id], "class" => "kt-form", "method" => "PUT", "files" =>  true]) !!}
            <!--begin::Portlet-->
            <x-form-container title="Edit Profile" cancel='{{ route($routes["index"]) }}'>
                <x-form :class="$form" />
            </x-form-container>

            <!--end::Portlet-->
        {!! Form::close() !!}
        </div>
    </div>
@endsection


@section("scripts")
    @include("partial.admin.js", ["page" => "bootstrap-select"])
    <script type="text/javascript">
        $(document).ready(function () {
            $("#role_id").selectpicker();
        });
    </script>
@endsection