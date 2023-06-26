@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
            {!! Form::model($data, ['route' => [$routes["update"], $data->id], "class" => "kt-form", "method" => "PUT", "files" =>  true]) !!}
            <!--begin::Portlet-->
                <x-form-container title="Update {{ $title }}" cancel='{{ route($routes["index"]) }}'>
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
            $("#category_id").selectpicker();
            $("#sizes").selectpicker();
            $("#colors").selectpicker();
        });
    </script>
@endsection
