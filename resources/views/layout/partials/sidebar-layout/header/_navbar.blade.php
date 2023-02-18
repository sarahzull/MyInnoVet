<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">
    <!--begin::Search-->
    {{-- <div class="app-navbar-item align-items-stretch ms-1 ms-lg-3">
        @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/search/_dropdown')
    </div> --}}
    <!--end::Search-->
    <!--begin::Activities-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3">
        <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" id="kt_activities_toggle">
            {!! getSvgIcon('duotune/general/gen032.svg', 'svg-icon svg-icon-1') !!}
        </div>
    </div> --}}
    <!--end::Activities-->
    <!--begin::Settings-->
    @can('settings_access')
        <div class="app-navbar-item ms-1 ms-lg-3">
            <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                <a href="">{!! getSvgIcon('duotune/coding/cod001.svg', 'svg-icon svg-icon-1') !!}</a>
            </div>
        </div>
    @endcan
    <!--end::Settings-->
    <!--begin::Chat-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3">
        <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative" id="kt_drawer_chat_toggle">
            {!! getSvgIcon('duotune/communication/com012.svg', 'svg-icon svg-icon-1') !!}
            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
        </div>
    </div> --}}
    <!--end::Chat-->
    <!--begin::My apps links-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3"> --}}
        <!--begin::Menu wrapper-->
        {{-- <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"> --}}
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            {{-- {!! getSvgIcon('duotune/general/gen025.svg', 'svg-icon svg-icon-1') !!} --}}
            <!--end::Svg Icon-->
        {{-- </div> --}}
        {{-- @include('partials/menus/_my-apps-menu') --}}
        <!--end::Menu wrapper-->
    {{-- </div> --}}
    <!--end::My apps links-->
    <!--begin::Theme mode-->
    {{-- <div class="app-navbar-item ms-1 ms-lg-3">
        @include('partials/theme-mode/_main')
    </div> --}}
    <!--end::Theme mode-->
    <!--begin::User menu-->
    <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img src="{{ image('avatars/blank.png') }}" alt="user" />
        </div>
        
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{ image('avatars/blank.png') }}" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-7">{{ Auth::user()->name }}</div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="/" class="menu-link px-5">My Profile</a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            {{-- <div class="menu-item px-5">
                <a href="/" class="menu-link px-5">
                    <span class="menu-text">My Projects</span>
                    <span class="menu-badge">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                    </span>
                </a>
            </div> --}}
            <!--end::Menu item-->

            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->

            <!--begin::Menu item-->
            {{-- <div class="menu-item px-5 my-1">
                <a href="/" class="menu-link px-5">Account Settings</a>
            </div> --}}
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->

        <!--end::Menu wrapper-->
    </div>
    <!--end::User menu-->
    <!--begin::Header menu toggle-->
    {{-- <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
            {!! getSvgIcon('duotune/text/txt001.svg', 'svg-icon svg-icon-1') !!}
            <!--end::Svg Icon-->
        </div>
    </div> --}}
    <!--end::Header menu toggle-->
</div>
<!--end::Navbar-->
