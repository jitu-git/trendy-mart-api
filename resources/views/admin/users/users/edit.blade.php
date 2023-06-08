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
            let role = {{ $data->role_id }}
            $("#role_id").selectpicker();

            $("#district_id").selectpicker();
            $("#taluka_id").selectpicker();
            if(role != 3) {
                $("#taluka_id_container").hide();
            }
           
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