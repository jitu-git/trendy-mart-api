@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-alert/>
            {!! Form::open(['route' => $routes["store"], "class" => "kt-form", "files" => true]) !!}
                <!--begin::Portlet-->
                <x-form-container title="Add new {{ $title }}" cancel='{{ route($routes["index"]) }}'>
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
            $("#district_id").selectpicker();
        });
    </script>
@endsection