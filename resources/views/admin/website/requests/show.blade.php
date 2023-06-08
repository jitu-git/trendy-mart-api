@extends('layouts.admin')

@section('content')

  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand {{ icon("shortcode") }}"></i>
                </span>
        <h3 class="kt-portlet__head-title">
          {{ $controller }}
        </h3>
      </div>

    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="col-md-6">
        <table class="table">
          <tr><th>Request ID</th> <td>{{ $content->id }}</td> </tr>
          <tr><th>Name</th> <td>{{ $content->name }}</td> </tr>
          <tr><th>Mobile No</th>  <td>{{ $content->mobile_no }}</td> </tr>
          <tr><th>Email</th>  <td>{{ $content->email }}</td> </tr>
          <tr><th>District</th><td>{{ $content->district()->first() ? $content->district()->first()->city_name : 'N/A' }}</td> </tr>
          @if($content->taluka_id)
          <tr><th>Taluka</th><td>{{ $content->taluka()->first()->name }}</td> </tr>
          @endif
          <tr><th>Service</th> <td>{{ $content->category->title }} </tr>
          <tr><th>Age</th><td>{{ $content->age }}</td> </tr>
          <tr><th>Gender</th>  <td>{{ $content->gender }}</td> </tr>
          <tr><th>Address</th> <td>{{ $content->address }} - {{ $content->pincode }}</td> </tr>
          @if($content->menu_id == 17)
            @php
              $data = json_decode($content->request);
            @endphp
            @if($data && $data->cnr_no)
              <tr><th>CNR No:</th> <td>{{ $data->cnr_no }}</td>
            @endif
            @if($data && $data->court_name)
              <tr><th>Court name:</th> <td>{{ $data->court_name }}</td>
            @endif
          @endif
          @if($content->attachment)
          <tr><th>Attachment:</th> <td><a href="{{ asset('storage/'.$content->attachment) }}" target="_blabk">Open</a></td>
          @endif
          @if($content->remark)
          <tr><td colspan="2">{{ $content->remark }}</td></tr>
          @endif

        </table>
      </div>
      
    </div>
  </div>
@endsection
