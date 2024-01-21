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

                    <div data-category-id="1" class="kanban-category">
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
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%;"
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





    <!-- Modal Body -->
    <div class="modal fade" id="openModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Gloceries / In Progress
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-12 col-lg-12 ">
                            <div class="mb-3 description" x-data="{
                                openDesc: false
                            }">
                                <span class="h5 fs--1 fw-bolder"> Description </span>



                                <div class="d-flex align-items-center justify-content-between "
                                    :class="openDesc === true ? 'd-none' : ''">
                                    <ion-icon name="reader-outline" class=" me-2" style="font-size:26px"></ion-icon>
                                    <input type="text" class="form-control-plaintext lead fs-6" readonly
                                        value="Description..." x-on:focus="openDesc = !openDesc">

                                </div>
                                <div class="hidden-area" x-show="openDesc">
                                    <textarea class="mb-2 form-control" placeholder="Description here.." name="" id="" rows="3"
                                        style="resize: none;"></textarea>
                                    <div>


                                        <button type="button" class="btn btn-gray-200 btn-sm"
                                            @click="openDesc = false">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Save
                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="checklists">
                                <span class="h5 fs--1 fw-bolder"> Checklist </span>
                                <div class="my-2 list-group ">
                                    <label class="p-0 list-group-item ">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        First checkbox
                                    </label>
                                    <label class="p-0 list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Second checkbox
                                    </label>
                                    <label class="p-0 list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Third checkbox
                                    </label>
                                    <label class="p-0 list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Fourth checkbox
                                    </label>
                                    <label class="p-0 list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Fifth checkbox
                                    </label>
                                </div>

                            </div>

                            <div class="date">

                                <span class="h5 fs--1 fw-bolder"> Due Date </span>

                                <div class="my-2 input-group"><span class="input-group-text"><ion-icon
                                            name="calendar"></ion-icon> </span><input data-datepicker=""
                                        class="form-control datepicker-input in-edit" id="birthday" type="text"
                                        placeholder="dd/mm/yyyy" required=""></div>
                            </div>
                        </div>



                    </div>


                </div>



                <div class="my-2 checklist">



                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>
