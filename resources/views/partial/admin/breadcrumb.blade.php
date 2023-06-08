<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <a href="{{ route("admin.dashboard") }}">Dashboard</a>
                </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>

            <div class="kt-subheader__breadcrumbs">
                @if(isset($breadcrumb))
                    @foreach($breadcrumb as $title => $link)
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{ $link }}" class="kt-subheader__breadcrumbs-link">
                            {{ ucfirst($title) }}</a>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>

<!-- end:: Content Head -->