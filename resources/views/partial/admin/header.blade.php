<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

    <!-- begin:: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

        </div>
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">

        <!--begin: Quick panel toggler -->


        <!--end: Quick panel toggler -->


        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ $name = get_user_info("name") }}</span>
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ $name[0] }}</span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset("assets/media/misc/bg-1.jpg") }})">
                    <div class="kt-user-card__avatar">
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ $name[0] }}</span>
                    </div>
                    <div class="kt-user-card__name">
                        {{ $name }}
                    </div>
                    <div class="kt-user-card__badge">
                        <span class="btn btn-success btn-sm btn-bold btn-font-md">0 messages</span>
                    </div>
                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{ route("admin.users.users.edit-profile") }}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                My Profile
                            </div>
                            <div class="kt-notification__item-time">
                                Account settings and more
                            </div>
                        </div>
                    </a>

                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{ route('logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->