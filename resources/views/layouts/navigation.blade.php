<style>
    .notification-bell.unread::before {
        right: 18px;
    }
</style>

<nav class="pb-0 navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2">
    <div class="px-0 container-fluid">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center" x-data="{
                openSearch: false,
                search: '',
                checkInput() {
                    search = this.search;
                    if (search === '') {
                        this.openSearch = false;
                    } else {
                        this.openSearch = true;
                    }
            
                }
            }">
                <!-- Search form -->
                <form class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar">
                        <span class="input-group-text" id="topbar-addon">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" x-model="search" @input="checkInput()" class="form-control"
                            id="topbarInputIconLeft" placeholder="Search" aria-label="Search"
                            aria-describedby="topbar-addon">
                    </div>

                    <div class="mt-1 dropdown open">

                        <div class="dropdown-menu " :class="openSearch === true ? 'show' : ''" style="min-width: 20rem;"
                            aria-labelledby="triggerId">
                            <div class="mt-2 dropdown-header">
                                <h6 class="mb-1 text-overflow text-muted text-uppercase ">Pages</h6>
                            </div>
                            <a class="dropdown-item" href="#">Actions</a>
                            <a class="dropdown-item disabled" href="#">Disabled action</a>

                            <div class="mt-2 dropdown-header">
                                <h6 class="mb-1 text-overflow text-muted text-uppercase">Tasks</h6>
                            </div>
                            <a class="dropdown-item" href="#">Actionsdsdsd</a>
                            <div class="mt-2 dropdown-header">
                                <h6 class="mb-1 text-overflow text-muted text-uppercase">Categories</h6>
                            </div>
                            <a class="dropdown-item" href="#">Actionsdsdsd</a>
                        </div>
                    </div>

                </form>
                <!-- / Search form -->
            </div>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark notification-bell unread dropdown-toggle"
                        data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        <i class='bx bxs-bell fs-3 text-body'></i>
                    </a>
                    <div class="py-0 mt-2 dropdown-menu dropdown-menu-lg dropdown-menu-center">
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="py-3 text-center text-primary fw-bold border-bottom border-light">Notifications</a>
                            <a href="./tasks.html" class="list-group-item list-group-item-action border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <div class="flex-shrink-0 avatar-xs me-1">
                                            <span class="avatar-title ">
                                                <ion-icon name="hourglass-outline" class="fs-2"></ion-icon>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col ps-0 ms-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 h6 text-small">Task Due Tomorrow</h4>
                                            </div>

                                        </div>
                                        <p class="mt-1 mb-0 font-small" style="font-size: 12px;"> One of your tasks,
                                            "Finish Project
                                            Proposal," is due tomorrow. Plan your time accordingly to complete it on
                                            schedule.
                                        </p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown ms-lg-3">
                    <a class="px-0 pt-1 nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle" alt="Image placeholder"
                                src="../../assets/img/team/profile-picture-3.jpg">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                <span class="mb-0 text-gray-900 font-small fw-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-end">

                        <a class="dropdown-item d-flex align-items-center" href="./settings.html">
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
