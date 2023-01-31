<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="17" />
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('site/assets/images/white-logo.svg') }}" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="17" />
                        </span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    <div class="position-relative">
                        <input type="hidden" class="form-control" placeholder="Search..." autocomplete="off"
                            id="search-options" value="" />
                        {{-- <span class="mdi mdi-magnify search-widget-icon"></span> --}}
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 320px">
                            <!-- item-->


                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="#" class="btn btn-soft-secondary btn-sm btn-rounded">how to
                                    setup <i class="mdi mdi-magnify ms-1"></i></a>
                                <a href="#" class="btn btn-soft-secondary btn-sm btn-rounded">buttons
                                    <i class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">
                                    Pages
                                </h6>
                            </div>

                            <!-- item-->




                        </div>


                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">




                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class="bx bx-fullscreen fs-22"></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class="bx bx-moon fs-22"></i>
                    </button>
                </div>



                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">

                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Admin</span>

                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->


                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
