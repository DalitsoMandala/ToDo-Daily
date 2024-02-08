<div>
    <div class="d-flex align-items-center" x-cloak x-data="{
        data: $store.data,

        openSearch: false,
        search: '',
        checkInput() {
            search = this.search;
            if (search === '') {
                this.openSearch = false;
            } else {
                this.openSearch = true;
            }

        },

        pageCount: Object.entries(data.pages).length,
        categoryCount: Object.entries(data.categories).length,
        taskCount: Object.entries(data.tasks).length,


        filteredPages() {
            search = this.search
            search = search.toLowerCase();

            return Object.entries(data.pages).filter(([page, link]) => page.toLowerCase().includes(search));
        },

        filteredCategories() {
            search = this.search
            search = search.toLowerCase();
            return Object.entries(data.categories).filter(([id, name]) => name.toLowerCase().includes(search));
        },

        filteredTasks() {
            search = this.search
            search = search.toLowerCase();
            return Object.entries(data.tasks).filter(([id, name]) => name.toLowerCase().includes(search));

        },

        clearInput() {
            this.search = '';
        },

        isShow: false,

    }" x-init="$watch('search', v => {


    })">


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
                <input type="text" x-model="search" class="form-control" style="width: 75%" id="topbarInputIconLeft"
                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">

                <button type="button" style="border: none; background:transparent" x-show="search !== ''"
                    style="" @click="clearInput()">
                    <i class="bx bx-x fs-2 text-muted "></i>
                </button>

            </div>

            <div class="mt-1 dropdown open">

                <div class="dropdown-menu show" x-show="search !== ''"
                    style="min-width: 20rem;  max-height: 10rem; overflow-y: auto;" aria-labelledby="triggerId">
                    <div x-show="pageCount > 0">
                        <div class="mt-2 dropdown-header">
                            <h6 class="mb-1 text-overflow text-muted text-uppercase " style="font-size: 0.8rem">Pages
                            </h6>
                        </div>
                        <template x-for="[page, link] of filteredPages()">
                            <a class="dropdown-item" :href="link" style="font-size: 0.7rem"
                                x-html="`<i class='bx bx-link text-info'></i> `+ page"></a>
                        </template>
                        <template x-if="filteredPages().length === 0">
                            <div class="dropdown-item text-muted" style="font-size: 0.7rem">No results found</div>
                        </template>
                    </div>

                    <div x-show="categoryCount > 0">
                        <div class="mt-2 dropdown-header">
                            <h6 class="mb-1 text-overflow text-muted text-uppercase " style="font-size: 0.8rem">Task
                                Categories</h6>
                        </div>
                        <template x-for="[id, name] of filteredCategories()">
                            <a class="dropdown-item" href="/categories" style="font-size: 0.7rem"
                                x-html="`<i class='bx bx-task text-dark' ></i> `+name"></a>
                        </template>
                        <template x-if="filteredCategories().length === 0">
                            <div class="dropdown-item text-muted" style="font-size: 0.7rem">No results found</div>
                        </template>
                    </div>


                    <div x-show="taskCount > 0">
                        <div class="mt-2 dropdown-header">
                            <h6 class="mb-1 text-overflow text-muted text-uppercase " style="font-size: 0.8rem">Tasks
                            </h6>
                        </div>
                        <template x-for="[id, name] of filteredTasks()">
                            <a class="dropdown-item" :href="`/edit-task/` + id" style="font-size: 0.7rem"
                                x-html="`<i class='bx bxs-badge-check text-success' ></i> `+name"></a>
                        </template>
                        <template x-if="filteredTasks().length === 0">
                            <div class="dropdown-item text-muted" style="font-size: 0.7rem">No results found</div>
                        </template>
                    </div>
                    {{-- <div class="mt-2 dropdown-header">
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
                    <a class="dropdown-item" href="#">Actionsdsdsd</a> --}}
                </div>
            </div>

        </form>
        <!-- / Search form -->
    </div>


    @script
        <script>
            data = @json($data);

            // Iterate over the pages object and log out each page and its link
            for (const [page, link] of Object.entries(data.pages)) {
                //  console.log(`${page}: ${link}`);
            }

            // Iterate over the pages object and log out each page and its link
            for (const [id, name] of Object.entries(data.tasks)) {
                //  console.log(`${id}: ${name}`);
            }

            for (const [id, name] of Object.entries(data.categories)) {
                //   console.log(`${id}: ${name}`);
            }

            // Filter tasks by a certain condition, for example, where the name contains 'example'
            const filteredTasks = Object.entries(data.tasks).filter(([id, name]) => name.includes('ut'));

            // Log out the filtered tasks
            for (const [id, name] of filteredTasks) {
            //    console.log(`${id}: ${name}`);
            }


            const filteredPages = Object.entries(data.pages).filter(([page, link]) => page.includes('as'));
            // Log out the filtered tasks
            for (const [page, link] of filteredPages) {
             //   console.log(`${page}: ${link}`);
            }



            const filteredCategories = Object.entries(data.categories).filter(([id, name]) => name.includes('as'));
            // Log out the filtered tasks
            for (const [id, name] of filteredCategories) {
           //     console.log(`${id}: ${name}`);
            }
        </script>
    @endscript

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('data', @json($data))
        })
    </script>
</div>
