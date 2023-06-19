@if(isset($field["type"]))
    @if($field["type"] === "radio")
        <div class="kt-checkbox-inline">
            @if($field["data"])
                @foreach($field["data"] as $value => $label)
                    <label class="kt-checkbox">
                        {{ Form::radio($field["name"], $value, null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }} {{ $label }}
                        <span></span>
                    </label>
                @endforeach
            @endif
        </div>

    @elseif($field["type"] === "checkbox")
        <div class="kt-checkbox-inline">
            @if($field["data"])
                @foreach($field["data"] as $value => $label)
                    <label class="kt-checkbox">
                        {{ Form::checkbox($field["name"] . "[]", $value, null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }} {{ $label }}
                        <span></span>
                    </label>
                @endforeach
            @endif
        </div>

    @elseif($field["type"] === "date_range")

        <div class="input-daterange input-group" id="{{ $field["extra"]["id"] }}">
            {{ Form::text($field["fields"]["start"]["name"], null, array_merge(["class" => "form-control"], $field["fields"]["start"]["extra"] ?? [])) }}
            <div class="input-group-append">
                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
            </div>
            {{ Form::text($field["fields"]["end"]["name"], null, array_merge(["class" => "form-control"], $field["fields"]["end"]["extra"] ?? [])) }}
        </div>

    @elseif($field["type"] === "select")
        {{ Form::select($field["name"], $field["data"], null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }}

    @elseif($field["type"] === "password")
        {{ Form::password($field["name"], array_merge(["class" => "form-control"], $field["extra"] ?? [])) }}

    @elseif($field["type"] === "color")
        {{ Form::color($field["name"], null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }}

    @elseif($field["type"] === "textarea")
        {{ Form::textarea($field["name"], null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }}


    @elseif($field["type"] === "file")
        {{ Form::file($field["name"], array_merge(["class" => "custom-file-input",  "accept"=>"image/*"], $field["extra"] ?? [])) }}
        <label class="custom-file-label" for="customFile" style="text-align:left">Choose file</label>

        @if(!empty($class->data) && $class->data->{$field["name"]})
            <div class="form-group" style="margin-top: 20px;">
                {{ Form::hidden("old_{$field["name"]}",$class->data->{$field["name"]}) }}
                <a href="{{ $class->data->{$field["name"]} }}" class="html5lightbox" >
                    <img src="{{ $class->data->{$field["name"]} }}" class="img-thumbnail" style="max-width: 60%;max-height: 60%;display: block;">
                </a>
            </div>
        @endif
    @endif

@else
    @if(isset($field["html"]))
        {!! $field["html"] !!}
    @else
        {{ Form::text($field["name"], null, array_merge(["class" => "form-control"], $field["extra"] ?? [])) }}
    @endif

@endif