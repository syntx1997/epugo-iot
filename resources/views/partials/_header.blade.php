<div class="header border-bottom">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        {{ $title ?? env('APP_NAME') }}
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown  header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.jpg') }}" width="56" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#logoutss" class="dropdown-item ai-icon">
                                <svg id="icon-settings" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
