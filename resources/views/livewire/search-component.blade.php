<div>
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
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" x-model="search" @input="checkInput()" class="form-control"
                    id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">

                <button type="button" class="btn btn-close">
                    Button
                </button>

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
</div>
