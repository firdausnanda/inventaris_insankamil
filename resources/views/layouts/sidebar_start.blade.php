        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ Auth::user()->hasRole('superadmin') ? route('superadmin.dashboard.index') : route('admin.dashboard.index') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('images/logos/logo2.png') }}" class="dark-logo" alt="Logo-Dark" />
                        <img src="{{ asset('images/logos/logo2.png') }}" class="light-logo" alt="Logo-light" />
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-- ---------------------------------- -->
                        <!-- Home -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ Auth::user()->hasRole('superadmin') ? route('superadmin.dashboard.index') : route('admin.dashboard.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Produk -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ Auth::user()->hasRole('superadmin') ? route('superadmin.produk.index') : route('admin.produk.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-book"></i>
                                </span>
                                <span class="hide-menu">Produk</span>
                            </a>
                        </li>
                        <!-- =================== -->
                        <!-- User -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ Auth::user()->hasRole('superadmin') ? route('superadmin.user.index') : route('admin.user.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">User</span>
                            </a>
                        </li>
                        <!-- =================== -->
                        <!-- Monitoring -->
                        <!-- =================== -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Monitoring</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Activity Log -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ Auth::user()->hasRole('superadmin') ? route('superadmin.activity-log.index') : route('admin.activity-log.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-activity"></i>
                                </span>
                                <span class="hide-menu">Activity Log</span>
                            </a>
                        </li>
                        <!-- =================== -->
                        <!-- Error Log -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('log-viewer') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-error-404"></i>
                                </span>
                                <span class="hide-menu">Error Log</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img src="{{ asset('images/profile/user-1.jpg') }}" class="rounded-circle" width="40"
                                height="40" alt="modernize-img" />
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">{{ Auth::user()->name }}</h6>
                            <span class="fs-2">{{ Auth::user()->roles->first()->name }}</span>
                        </div>
                        <a class="border-0 bg-transparent text-primary ms-auto" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti ti-power fs-6"></i>
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
