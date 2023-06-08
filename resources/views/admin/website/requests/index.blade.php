@extends('layouts.admin')

@section('content')
    <x-alert/>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand {{ icon("pages")  }}"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{ $controller }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="inline-block">
                        <div class="btn-group btn-group-justified">
                           
                            <div class="btn-group pl-1">
                                {{Form::select('limit', $limits, $limit, ['class' => 'change_limit form-control'])}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">
                            {{ Form::model($search, ['class'=>'form-inline','method' =>'get', 'id' => 'search_form']) }}
                            <input type="hidden" id="perpage" name="perpage" value="{{ $limit }}">
                            <input type="hidden" id="export" name="export">
                            <div class="form-group mb-2 mr-sm-2">
                                {{ Form::text('form[like][name]', null, ['class' => 'form-control', "placeholder" => "Name"]) }}
                            </div>
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} &nbsp;&nbsp;
                            <a href="{{ route($routes['index']) }}" class="btn btn-warning" >Reset</a> &nbsp;
                            {{Form::close()}}

                        </div>
                    </div>

                </div>
            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            {{ Form::open(["route" => $routes['actions'],  "id" => "bulk_action", "method" => "post"]) }}
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">

                <input type="hidden" name="action" id="action" value="">
                @if($data->count() > 0)

                    <div class="kt-datatable__pager kt-datatable--paging-loaded">
                        <div class="float-left">
                            <div class="inline-block">
                                <div class="btn-group btn-group-justified">
                                    @include("partial.admin.bulk_actions")
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" id="all_bulk_action"></th>
                                <th scope="col">ID</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>District</th>
                                <th>Service</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $content)
                                <tr>
                                    <td><input type="checkbox" class="bulk_action" name="bulk_ids[]" value="{{ $content->id }}"/></td>
                                    <td scope="row"> {{ $content->id }} </td>
                                    <td>{{ $content->name }}</td>
                                    <td>{{ $content->mobile_no }}</td>
                                    <td>{{ $content->email }}</td>
                                    <td>{{ $content->district()->first() ? $content->district()->first()->city_name : 'N/A'}}</td>
                                    <td>{{ $content->category->title }}
                                        @if($content->menu_id == 5)
                                            <p><b>Name</b>: {{ $content->patient_name }}</p>
                                            <p><b>Address</b>: {{ $content->patient_address }}</p>
                                            <p><b>Mobile no</b>: {{ $content->patient_mobile_no }}</p>
                                        @endif
                                        @if($content->remark)
                                            <br/>
                                             {{ $content->remark }}
                                        @endif
                                    </td>
                                    <td>{{ $content->address }} - {{ $content->pincode }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route($routes['show'], $content->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route($routes['comments'], $content->id) }}"><i class="fa fa-comment"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="kt-datatable__pager kt-datatable--paging-loaded">

                        <div class="float-left">
                            <div class="inline-block">
                                <div class="btn-group btn-group-justified">
                                    @include("partial.admin.bulk_actions")
                                </div>
                            </div>
                        </div>

                        {{ $data->appends($_GET)->render()}}

                        <div class="kt-datatable__pager-info">
                            <span class="kt-datatable__pager-detail">Total: {{ $data->total() }}</span>
                        </div>
                    </div>

                @else
                    @include("partial.admin.no_results")
                @endif


            </div>
            {{ Form::close() }}
            <!--end: Datatable -->
        </div>
    </div>
@endsection
