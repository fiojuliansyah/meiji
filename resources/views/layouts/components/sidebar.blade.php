<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="/assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="/assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <span class="menu-icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <a class="menu-link {{ request()->routeIs('roles') ? 'active' : '' }}"
                            href="{{ route('roles') }}">
                            <span class="menu-icon">
                                <i class="fas fa-key"></i>
                            </span>
                            <span class="menu-title">Roles</span>
                        </a>
                        <a class="menu-link {{ request()->routeIs('users') ? 'active' : '' }}"
                            href="{{ route('users') }}">
                            <span class="menu-icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="menu-title">Users</span>
                        </a>
                        <a class="menu-link {{ request()->routeIs('careers.list') ? 'active' : '' }}"
                            href="{{ route('careers.list') }}">
                            <span class="menu-icon">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <span class="menu-title">Careers</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>