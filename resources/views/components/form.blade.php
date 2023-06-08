@if($form)
    @foreach($form as $filed)
        @if(isset($filed["type"]) && $filed["type"] === "hidden")
            {{ Form::hidden($filed["name"], null, isset($filed["extra"] ) ? $filed["extra"] : [] ) }}
            <?php continue; ?>
        @endif
        <div class="form-group row" id="{{ $filed['id'] ?? $filed['name'] }}_container">
            @if(isset($filed["label"]) && $filed["label"] !== false)
                {{ Form::label($filed["name"],  (isset($filed["extra"]["required"]) && $filed["extra"]["required"] === true) ? $filed["label"] . " *" : $filed["label"] , ["class" => "col-3 col-form-label"]) }}
            @endif
            <div class="col-9">
                @if(isset($filed["prefix"]) || isset($filed["suffix"]))
                    <div class="row">
                        @if(isset($filed["prefix"]))
                            <div class="{{ isset($filed["prefix"]["class"]) ? $filed["prefix"]["class"] : "col-3" }}">
                                <x-fields :field='$filed["prefix"]' :class="$class" />
                            </div>
                        @endif
                        <div class="{{ isset($filed["class"]) ? $filed["class"] : "col-9" }}">
                @endif
                <x-fields :field="$filed" :class="$class" />

                @if(isset($filed["prefix"]) || isset($filed["suffix"]))
                    @if(isset($filed["prefix"]))
                        </div>
                    @endif
                    @if(isset($filed["suffix"]))

                        <div class="{{ isset($filed["suffix"]["class"]) ? $filed["suffix"]["class"] : "col-3" }}">
                            <x-fields :field='$filed["suffix"]' :class="$class" />
                        </div>
                    @endif
                    @if(isset($filed["prefix"]))
                        </div>
                @endif
                @endif
    </div>
</div>
@endforeach
@endif

{{ $slot }}

