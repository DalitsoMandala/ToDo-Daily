<div>
    <div class="p-5 my-3 bg-gray-200 rounded">
        <div class="row d-flex align-items-center">
            <div class="col-lg-8">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hi John, Welcome back!</h1>

                    <p class="lead">Stay organized and boost your productivity with our simple and effective to-do
                        list. Manage
                        your
                        tasks, set priorities, and accomplish your goals seamlessly.</p>
                    <a href="./add-task.html" class="btn btn-lg btn-outline-primary">Add Task +</a>
                </div>

            </div>

            <div class="col-lg-4">
                <img src="./assets/img/illustrations/welcome.png" alt="" srcset="">
            </div>
        </div>



    </div>

    <div class="my-2 text-left card bg-secondary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="mb-0 card-title">Task Progress</h4>
            <p class="card-text ">30/40 task done</p>
            <div class="progress-wrapper">
                <div class="progress-info">
                    <div class="progress-label">
                        <span class="text-primary">Progress</span>
                    </div>
                    <div class="progress-percentage ">
                        <span class="text-primary">60%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <span class="badge bg-primary p">August 2024</span>

        </div>
    </div>


    <h1 class="my-4 h3">Overview</h1>
    <div class="container">

    </div>
    <div class="row gy-3">
        <div class="col-12 col-lg-6 col-xl-4 col-xxl-4 " id="inprogress-list">
            <div class="border-none shadow-none card category-cover bg-gr h-100">
                <div class="card-header border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h5 class="mb-0 fs-6 fw-bolder">In progress</h5>
                        <div class="dropdown"><button type="button" class="px-1 py-0 btn btn-sm fs-6 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="ellipsis-horizontal-sharp" class="fs-5"></ion-icon>
                            </button>
                            <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start"><a
                                    class="dropdown-item d-flex align-items-center" href="./tasks.html"><ion-icon
                                        name="link-sharp" class="me-3"></ion-icon> View
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- INPROGRESS CARD -->
                <div class="pt-0 card-body drop " data-status="inprogress">
                    @foreach ($categories as $category)
                        <div data-category-id="{{ $category->id }}" class="kanban-category">


                            <div class="p-4 my-3 bg-gray-100 border-0 shadow card">


                                <div class="p-0 card-body">

                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $category->name }}</span>
                                            </div>
                                            <div class="progress-percentage ">
                                                <span class="text-primary">60%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: 60%;" aria-valuenow="60" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="date-category d-flex align-items-center"><ion-icon
                                                name="calendar-outline" class="me-1"></ion-icon>
                                            {{ \Carbon\Carbon::parse($category->due_date)->format('j M, Y') }}</span>

                                        <span class="d-flex align-items-center"><ion-icon
                                                name="checkmark-circle-outline" class="me-1"></ion-icon>
                                            1/5</span>
                                    </div>

                                </div>
                            </div>


                        </div>
                    @endforeach



                </div>
                <!-- END INPROGRESS CARD -->

            </div>

        </div>

        <div class="col-12 col-lg-6 col-xl-4 col-xxl-4" id="completed-list">
            <div class="border-none shadow-none card category-cover h-100 ">
                <div class="card-header border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h5 class="mb-0 fs-6 fw-bolder">Completed</h5>
                        <div class="dropdown"><button type="button" class="px-1 py-0 btn btn-sm fs-6 dropdown-toggle"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="ellipsis-horizontal-sharp" class="fs-5"></ion-icon>
                            </button>
                            <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><ion-icon
                                        name="link-sharp" class="me-3"></ion-icon> View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-0 card-body drop " data-status="completed">

                    <!-- COMPLETED CARD -->
                    <div data-category-id="3" class="kanban-category">


                        <div class="p-4 my-3 bg-gray-100 border-0 shadow card">

                            <div class="p-0 border-0 card-header d-flex align-items-center justify-content-between ">
                                <h1 class="h5">Gloceries</h1>
                            </div>

                            <div class="p-0 card-body">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="progress-label">
                                            <span class="text-primary">Progress</span>
                                        </div>
                                        <div class="progress-percentage ">
                                            <span class="text-primary">60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="date-category d-flex align-items-center"><ion-icon
                                            name="calendar-outline" class="me-1"></ion-icon> 7 Aug, 2024</span>

                                    <span class="d-flex align-items-center"><ion-icon name="checkmark-circle-outline"
                                            class="me-1"></ion-icon>
                                        1/5</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- END COMPLETED CARD -->

                </div>

            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl-4 col-xxl-4" id="overdue-list">
            <div class="border-none shadow-none card category-cover h-100 ">
                <div class="card-header border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h5 class="mb-0 fs-6 fw-bolder">Overdue</h5>
                        <div class="dropdown"><button type="button"
                                class="px-1 py-0 btn btn-sm fs-6 dropdown-toggle" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <ion-icon name="ellipsis-horizontal-sharp" class="fs-5"></ion-icon>
                            </button>
                            <div class="py-1 mt-2 dropdown-menu dashboard-dropdown dropdown-menu-start"><a
                                    class="dropdown-item d-flex align-items-center" href="#"><ion-icon
                                        name="link-sharp" class="me-3"></ion-icon> View
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="pt-0 card-body drop" data-status="overdue">
                    <!-- OVERDUE CARD -->
                    <div data-category-id="4" class="kanban-category">

                        <div class="p-4 my-3 bg-gray-100 border-0 shadow card">

                            <div class="p-0 border-0 card-header d-flex align-items-center justify-content-between ">
                                <h1 class="h5">Gloceries</h1>
                            </div>

                            <div class="p-0 card-body">

                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="progress-label">
                                            <span class="text-primary">Progress</span>
                                        </div>
                                        <div class="progress-percentage ">
                                            <span class="text-primary">60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="date-category d-flex align-items-center"><ion-icon
                                            name="calendar-outline" class="me-1"></ion-icon> 7 Aug, 2024</span>

                                    <span class="d-flex align-items-center"><ion-icon name="checkmark-circle-outline"
                                            class="me-1"></ion-icon>
                                        1/5</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div data-category-id="5" class="kanban-category">

                        <div class="p-4 my-3 bg-gray-100 border-0 shadow card">

                            <div class="p-0 border-0 card-header d-flex align-items-center justify-content-between ">
                                <h1 class="h5">Gloceries</h1>
                            </div>

                            <div class="p-0 card-body">

                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        <div class="progress-label">
                                            <span class="text-primary">Progress</span>
                                        </div>
                                        <div class="progress-percentage ">
                                            <span class="text-primary">60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 60%;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="date-category d-flex align-items-center"><ion-icon
                                            name="calendar-outline" class="me-1"></ion-icon> 7 Aug, 2024</span>

                                    <span class="d-flex align-items-center"><ion-icon name="checkmark-circle-outline"
                                            class="me-1"></ion-icon>
                                        1/5</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- END OVERDUE CARD -->

                </div>

            </div>

        </div>

    </div>





    @script
        <script>
            $(document).ready(function() {
                var isDragging = false;
                $(".drop")
                    .sortable({
                        connectWith: ".drop",
                        placeholder: "ui-state-highlight",
                        placeholder: "portlet-placeholder ui-corner-all",
                        start: function(e, ui) {
                            ui.placeholder.height(ui.helper.outerHeight());
                        },

                        stop: function(e, ui) {},
                        update: function(event, ui) {
                            // Get the updated order and status
                            var order = $(this).sortable("toArray", {
                                attribute: "data-category-id",
                            });
                            var status = $(this).data("status");

                            // Log the result to the console
                            console.log(`${status} - Updated Order:`, order);
                        },
                    })
                    .disableSelection();


            });
        </script>
    @endscript

</div>
