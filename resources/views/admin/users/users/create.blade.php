@extends('layouts.admin')

@section("css")
    @include("partial.admin.css", ["page" => "bootstrap-select"])
@endsection

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
            $("#role_id").selectpicker();
            $("#district_id").selectpicker();
            $("#taluka_id").selectpicker();
            $("#taluka_id_container").hide();

            let role = 1;
            $("#role_id").change(function(e) {
                role = e.target.value;
                if(role == 3) {
                    $("#taluka_id_container").show();
                }
            });
            $("#district_id").change(function(e) {
                if(role == 3) {
                    $.get("{{ route('admin.website.taluka.list-by-dis') }}?district="+ e.target.value).then(function(res){
                    console.log(res);
                    $("#taluka_id").html(res);
                    $('#taluka_id').selectpicker('refresh');
                });
                }
            });
        });
    </script>
@endsection
