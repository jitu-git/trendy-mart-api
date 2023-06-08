@if($data)
    <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
        @foreach($data as $menu)

            <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded"
                id="menuItem_{{ $menu->id }}" data-parent="{{ $menu->parent_id }}"
                data-title="{{ $menu->label }}"
            >

                <div class="menuDiv">
                    <div class="menuEdit hidden" id="menuEdit{{ $menu->id }}">
                        {{ $menu->label }}
                    </div>
                </div>
                @if($menu->child->count() > 0 )
                    {!! create_list($menu->child) !!}
                @endif
            </li>
        @endforeach
    </ol>
@endif