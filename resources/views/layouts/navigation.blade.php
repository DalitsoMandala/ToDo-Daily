<style>
    .notification-bell.unread::before {
        right: 18px;
    }
</style>

<nav class="pb-0 navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2">
    <div class="px-0 container-fluid">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <livewire:search-component />
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <livewire:notification-component />
                </li>
                <li class="nav-item dropdown ms-lg-3">
                    <a class="px-0 pt-1 nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle" alt="Image placeholder"
                                src="../../assets/img/team/profile-picture-3.jpg">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 text-gray-900 font-small fw-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-end">

                        <a class="dropdown-item d-flex align-items-center" href="{{ route('settings') }}">
                            <ion-icon name="cog" class=" me-2 fs-5"></ion-icon>
                            Settings
                        </a>


                        <div role="separator" class="my-1 dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf



                            <a class="dropdown-item d-flex align-items-center" href="route('logout')"
                                onclick="event.preventDefault();
                        this.closest('form').submit();">
                                <ion-icon name="log-out" class="text-danger me-2 fs-5"></ion-icon>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="d-lg-none d-xl-none d-block ">
    <hr>
</div>
