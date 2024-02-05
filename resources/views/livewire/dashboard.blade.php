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
                    <a href="{{ route('add-task') }}" class="btn btn-lg btn-outline-primary">Add Task +</a>
                </div>

            </div>

            <div class="col-lg-4">
                <img src="./assets/img/illustrations/welcome.png" alt="" srcset="">
            </div>
        </div>



    </div>

    <div class="my-2 text-left card bg-secondary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body" x-data="{
            percentage: 0,
            date: '',
        }" x-init=" completed_tasks = '{{ $completed_tasks }}';
         total = '{{ $total_tasks }}';
         percentage = parseFloat(completed_tasks / total) * 100;
         percentage = Math.round(percentage);
        
         const currentDate = new Date();
        
         // Get the current date components
         const year = currentDate.getFullYear();
         const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Month is zero-based
         const day = String(currentDate.getDate()).padStart(2, '0');
        
         date = `${day}-${month}-${year}`;">
            <h4 class="mb-0 card-title">Task Progress</h4>
            <p class="card-text ">{{ $completed_tasks }}/{{ $total_tasks }} task done</p>
            <div class="progress-wrapper">
                <div class="progress-info">
                    <div class="progress-label">
                        <span class="text-primary">Progress</span>
                    </div>
                    <div class="progress-percentage ">
                        <span class="text-primary" x-text="percentage+'%'">0%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;"
                        x-bind:style="{ width: percentage + '%' }" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
            </div>
            <span class="badge bg-primary" x-text="date">August 2024</span>

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
                                    class="dropdown-item d-flex align-items-center" href="#"><ion-icon
                                        name="link-sharp" class="me-3"></ion-icon> View
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- INPROGRESS CARD -->
                <div class="pt-0 card-body drop " data-status="inprogress" wire:ignore>
                    @foreach ($inprogress_categories as $inprogress)
                        <div data-category-id="{{ $inprogress->id }}" class="kanban-category">


                            <div class="p-4 my-3 bg-gray-100 border-0 shadow card draggable"
                                data-href="{{ $inprogress->name }}">


                                <div class="p-0 card-body">

                                    <div class="progress-wrapper" x-data="{ percentage: '' }" x-init=" completed_tasks = '{{ $inprogress->completed_tasks }}';
                                     total = '{{ $inprogress->total_tasks }}';
                                     percentage = parseFloat(completed_tasks / total) * 100;
                                     percentage = Math.round(percentage);">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $inprogress->name }}</span>
                                            </div>
                                            <div class="progress-percentage ">
                                                <span class="text-primary" x-text="percentage+'%'"></span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;"
                                                x-bind:style="{ width: percentage + '%' }" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="date-category d-flex align-items-center" style="font-size:12px"> <i
                                                class='bx bx-calendar-check me-2'></i>
                                            {{ \Carbon\Carbon::parse($inprogress->due_date)->format('j M, Y') }}</span>
                                        <a href="{{ route('tasks') }}">
                                            <span class="d-flex align-items-center" style="font-size:12px"><i
                                                    class='bx bxs-check-circle me-1 text-secondary'></i>
                                                Tasks
                                                {{ $inprogress->completed_tasks }}/{{ $inprogress->total_tasks }}</span>
                                        </a>
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
                <div class="pt-0 card-body drop " data-status="completed" wire:ignore>

                    <!-- COMPLETED CARD -->



                    @foreach ($completed_categories as $complete)
                        <div data-category-id="{{ $complete->id }}" class="kanban-category">


                            <div class="p-4 my-3 bg-gray-100 border-0 shadow card draggable"
                                data-href="{{ $complete->name }}">


                                <div class="p-0 card-body">

                                    <div class="progress-wrapper" x-data="{ percentage: '' }" x-init=" completed_tasks = '{{ $complete->completed_tasks }}';
                                     total = '{{ $complete->total_tasks }}';
                                     percentage = parseFloat(completed_tasks / total) * 100;
                                     percentage = Math.round(percentage);">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $complete->name }}</span>
                                            </div>
                                            <div class="progress-percentage ">
                                                <span class="text-primary" x-text="percentage+'%'"></span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 0%;" x-bind:style="{ width: percentage + '%' }"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="date-category d-flex align-items-center" style="font-size:12px">
                                            <i class='bx bx-calendar-check me-2'></i>
                                            {{ \Carbon\Carbon::parse($complete->due_date)->format('j M, Y') }}</span>

                                        <span class="d-flex align-items-center" style="font-size:12px"><i
                                                class='bx bxs-check-circle me-1 text-success'></i>
                                            Tasks
                                            {{ $complete->completed_tasks }}/{{ $complete->total_tasks }}</span>
                                    </div>

                                </div>
                            </div>


                        </div>
                    @endforeach


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
                <div class="pt-0 card-body drop" data-status="overdue" wire:ignore>
                    <!-- OVERDUE CARD -->
                    @foreach ($overdue_categories as $overdue)
                        <div data-category-id="{{ $overdue->id }}" class="kanban-category"
                            data-href="{{ $overdue->name }}">


                            <div class="p-4 my-3 bg-gray-100 border-0 shadow card draggable">


                                <div class="p-0 card-body">

                                    <div class="progress-wrapper" x-data="{ percentage: '' }" x-init=" completed_tasks = '{{ $overdue->completed_tasks }}';
                                     total = '{{ $overdue->total_tasks }}';
                                     percentage = parseFloat(completed_tasks / total) * 100;
                                     percentage = Math.round(percentage);">
                                        <div class="progress-info">
                                            <div class="progress-label">
                                                <span class="text-primary">{{ $overdue->name }}</span>
                                            </div>
                                            <div class="progress-percentage ">
                                                <span class="text-primary" x-text="percentage+'%'"></span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;"
                                                x-bind:style="{ width: percentage + '%' }" aria-valuenow="60"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="date-category d-flex align-items-center" style="font-size:12px">
                                            <i class='bx bx-calendar-check me-2'></i>
                                            {{ \Carbon\Carbon::parse($overdue->due_date)->format('j M, Y') }}</span>

                                        <span class="d-flex align-items-center" style="font-size:12px"><i
                                                class='bx bxs-check-circle me-1 text-danger'></i>
                                            Tasks
                                            {{ $overdue->completed_tasks }}/{{ $overdue->total_tasks }}</span>
                                    </div>

                                </div>
                            </div>


                        </div>
                    @endforeach

                    <!-- END OVERDUE CARD -->

                </div>

            </div>

        </div>

    </div>





    @script
        <script>
            $(".drop")
                .sortable({
                    connectWith: ".drop",
                    handle: '.draggable',
                    placeholder: "ui-state-highlight",
                    placeholder: "portlet-placeholder ui-corner-all",
                    helper: 'clone',
                    start: function(e, ui) {
                        ui.placeholder.height(ui.helper.outerHeight());
                    },



                    stop: function(e, ui) {},
                    update: function(event, ui) {
                        ui.item.unbind("click");
                        // Get the updated order and status
                        var order = $(this).sortable("toArray", {
                            attribute: "data-category-id",
                        });
                        var status = $(this).data("status");

                        // Log the result to the console
                        //     console.log(`${status} - Updated Order:`, order);

                        $wire.dispatch('move-card', {
                            status: status,
                            order: order
                        });
                    },
                })
                .disableSelection();

            $('.draggable').on('click', function() {
                $wire.encryptValue($(this).attr('data-href'));
            });
        </script>
    @endscript

</div>
