<div>

    <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
            <div class="me-lg-3">
                <div class="dropdown"><a href="{{ route('add-task') }}" wire:navigate
                        class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle">New Task
                        +</a>

                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-gray-800" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Archive selected"><ion-icon name="archive"></ion-icon></button>
                <button class="btn btn-gray-800 text-white" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Mark selected"><ion-icon name="checkmark-circle"></ion-icon></button>
                <button class="btn btn-gray-800 text-white" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Delete selected"><ion-icon name="trash-bin"></ion-icon></button>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex justify-content-lg-end"><input type="text"
                class="form-control w-100 fmxw-300" id="exampleInputIconLeft" placeholder="Search Tasks Here"
                aria-label="Search" aria-describedby="basic-addon3"></div>
    </div>

    <div class="d-flex justify-content-between">

        <h1 class="h3">Tasks</h1>
        <ul class="nav">
            <li class="nav-item mx-2">
                <a class="nav-link active btn btn-secondary" aria-current="page" href="./tasks.html">All</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link btn " href="./tasks-inprogress.html"><ion-icon name="analytics"></ion-icon>
                    Inprogress </a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link btn" href="./tasks-completed.html"><ion-icon name="flash"></ion-icon>
                    Completed</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link btn" href="./tasks-overdue.html" tabindex="-1" aria-disabled="true"><ion-icon
                        name="alert-circle"></ion-icon> Overdue</a>
            </li>
        </ul>
    </div>

    <div class="task-wrapper border bg-white shadow border-0 rounded my-4 ">
        <div class="card hover-state border-bottom rounded-0 rounded-top py-3" x-data="{
            checked: false,
            checkInput: '',


        }">

            <div class="card-body d-sm-flex align-items-center flex-wrap flex-lg-nowrap py-0">
                <div class="col-1 text-left text-sm-center mb-2 mb-sm-0">
                    <div class="form-check check-lg inbox-check me-sm-2"><input class="form-check-input" type="checkbox"
                            id="mailCheck1" x-model="checkInput" x-bind:checked="checked === true ? 'checked' : ''">
                        <label class="form-check-label" for="mailCheck1"></label>
                    </div>
                </div>
                <div class="col-11 col-lg-8 px-0 mb-4 mb-md-0">
                    <div class="mb-2">
                        <h3 class="h5 " :class="checkInput === true ? 'line-through' : ''">Meeting with Ms.Bonnie
                            from
                            Themesberg LLC</h3>

                        <div class="d-inline-flex">
                            <span class="date-category d-flex align-items-center mx-2"><ion-icon name="calendar-outline"
                                    class="me-1"></ion-icon> 7 Aug, 2024</span>

                            <span class="d-flex align-items-center mx-2"> <span class="progress-complete"></span>
                                Completed</span>
                            <span class="d-flex align-items-center mx-2"><ion-icon name="folder-open"
                                    class="me-1"></ion-icon> Uncategorized</span>
                        </div>
                    </div>

                </div>
                <div
                    class="col-10 col-sm-2 col-lg-2 col-xl-2 d-none d-lg-block d-xl-inline-flex align-items-center ms-lg-auto text-right justify-content-end px-md-0">
                    <div class="dropdown"><button
                            class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><ion-icon
                                name="ellipsis-horizontal" class="fs-4"></ion-icon><span
                                class="visually-hidden">Toggle
                                Dropdown</span></button>
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1"><a
                                class="dropdown-item d-flex align-items-center" href="#"><ion-icon name="create"
                                    class="fs-5 me-2"></ion-icon> Edit </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <ion-icon name="checkmark" class="fs-5 me-2"></ion-icon> Mark as Completed </a><a
                                class="dropdown-item d-flex align-items-center" href="#"><ion-icon name="trash"
                                    class="fs-5 me-2"></ion-icon> Delete</a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="row p-4 ">
            <div class="col-7 mt-1">Showing 1 - 20 of 289</div>
            <div class="col-5">
                <div class="btn-group float-end"><a href="#" class="btn btn-gray-100"><svg class="icon icon-sm"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg> </a><a href="#" class="btn btn-gray-800"><svg class="icon icon-sm"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg></a></div>
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
                            <div class="description mb-3" x-data="{
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
                                    <textarea class="form-control mb-2" placeholder="Description here.." name="" id="" rows="3"
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
                                <div class="list-group my-2 ">
                                    <label class="list-group-item p-0 ">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        First checkbox
                                    </label>
                                    <label class="list-group-item p-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Second checkbox
                                    </label>
                                    <label class="list-group-item p-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Third checkbox
                                    </label>
                                    <label class="list-group-item p-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Fourth checkbox
                                    </label>
                                    <label class="list-group-item p-0">
                                        <input class="form-check-input me-1" type="checkbox" value="" />
                                        Fifth checkbox
                                    </label>
                                </div>

                            </div>

                            <div class="date">

                                <span class="h5 fs--1 fw-bolder"> Due Date </span>

                                <div class="input-group my-2"><span class="input-group-text"><ion-icon
                                            name="calendar"></ion-icon> </span><input data-datepicker=""
                                        class="form-control datepicker-input in-edit" id="birthday" type="text"
                                        placeholder="dd/mm/yyyy" required=""></div>
                            </div>
                        </div>



                    </div>


                </div>



                <div class="checklist my-2">



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
