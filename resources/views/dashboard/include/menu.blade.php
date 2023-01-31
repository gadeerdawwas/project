<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="    margin-top: 42px;">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <span class="md:text-2xl sm:text-3xl font-[Cairo] cursor-pointer">
                    {{-- <img src="{{ asset('assets/images/site-logo.svg') }}" alt="" height="22"> --}}
                    <h3 style="color: #fff;"> المكتبات الإلكترونية</h3>


                </span>
            </span>
            <span class="logo-lg">
                <h3 style="color: #fff;"> المكتبات الإلكترونية</h3>
                {{-- <img src="{{ asset('assets/images/site-logo.svg') }}" alt="" height="17"> --}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">

            <span class="logo-lg">
                <h3 style="color: #fff;"> المكتبات الإلكترونية</h3>
                {{-- <img src="{{ asset('assets/images/site-logo.svg') }}" alt="" height=""> --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" style="    margin-top: 20px;">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link menu-link" href="" role="button" aria-expanded="false"
                    aria-controls="sidebarDashboards">
                    <span data-key="t-dashboards">لوحة التحكم</span>
                </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarApps" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-calendar.html" class="nav-link" data-key="t-calendar"> Calendar </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('manager.books') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-apps-2-line"></i>  <span data-key="t-dashboards" >  الكتب      </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('manager.categories.index') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-apps-2-line"></i>  <span data-key="t-dashboards" >  الأقسام      </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('manager.teachers.index') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-apps-2-line"></i>  <span data-key="t-dashboards" >  المعلمين      </span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('manager.students.index') }}" role="button" aria-expanded="false"
                        aria-controls="sidebarDashboards">
                        <i class="ri-apps-2-line"></i>  <span data-key="t-dashboards" >  الطلاب      </span>
                    </a>

                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
