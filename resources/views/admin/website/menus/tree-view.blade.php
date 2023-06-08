@extends('layouts.admin')

@section("css")
    @include("partial.admin.css", ["page" => "tree-view"])

@endsection

@section('content')
    <x-alert/>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand {{ icon("menus") }}"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{ $controller }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="inline-block">
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group pl-3">
                                <a class="btn btn-warning btn-icon-sm" data-toggle="kt-tooltip" title="Save" id="save">
                                    Save
                                </a>
                            </div>
                            <div class="btn-group pl-1">
                                <a href="{{ route("admin.website.menus.index") }}" class="btn btn-primary">List View</a>
                            </div>

                            <div class="btn-group pl-1">
                                {!! add_link($routes['create']) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <div class="row">
                <div class="col-md-9">
                    <div class="card mb-3">
                        <div class="card-body">
                            {{ Form::open(["route" => current_route(),  "id" => "bulk_action", "method" => "post", "id" => "tree_menu"]) }}
                                <ul id="myEditor" class="sortableLists list-group"></ul>
                            <input type="hidden" name="data" id="data">
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section("scripts")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
    @include("partial.admin.js", ["page" => "tree-view"])


    <script type="text/javascript">
        $(document).ready(function () {

            var arrayjson = JSON.parse('<?php echo $data; ?>');

            var editor = new MenuEditor('myEditor');
            editor.setForm($('#frmEdit'));

            editor.setData(arrayjson);

            $('#save').on('click', function () {
                var str = editor.getString();
                $("#data").val(str);
                $("#tree_menu").submit();

            });

        });

    </script>
@endsection
