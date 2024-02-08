<div>
 

    <div class="d-lg-flex justify-content-between flex-wrap flex-md-nowrap align-items-baseline py-4">
        <div class="col-auto d-flex justify-content-between ps-0 mb-4 mb-lg-0">
            <div class="me-lg-3">
                <div class="dropdown"><a href="{{ route('add-task') }}" wire:navigate
                        class="btn btn-secondary d-inline-flex align-items-center me-2 dropdown-toggle">New Task
                        +</a>

                </div>
            </div>
            <div class="btn-group" x-data="{
                checked: @entangle('taskChecked')
            }" x-init="const btn1 = $refs.btn_1;
            const tooltip = new bootstrap.Tooltip(btn1, {
                placement: 'top',
                title: 'Archive selected',
            })


            const btn3 = $refs.btn_3;
            const tooltip3 = new bootstrap.Tooltip(btn3, {
                placement: 'top',
                title: 'Delete selected',
            })">

                <div class="dropdown open">
                    <button @click="$dispatch('task-action', {id: checked})" data-bs-target="#archiveModal"
                        x-ref="btn_1" data-bs-toggle="modal" class="btn btn-gray-800" :disabled="checked.length === 0">
                        <ion-icon name="archive" wire:ignore class="text-warning"></ion-icon>
                    </button>

                    <button :disabled="checked.length === 0" class="btn btn-primary" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <ion-icon name="checkmark-done-circle-outline" class="text-success " wire:ignore></ion-icon>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="markDropdown">
                        <button class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markModal"
                            @click="$dispatch('task-action-mark', {id: checked, type: 'completed'})">Mark
                            completed</button>
                        <button class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markModal"
                            @click="$dispatch('task-action-mark', {id: checked, type: 'inprogress'})">Mark
                            Inprogress</button>
                        <button class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#markModal"
                            @click="$dispatch('task-action-mark', {id: checked, type:'overdue'})">Mark
                            Overdue</button>
                    </div>

                    <button @click="$dispatch('task-action', {id: checked})" data-bs-target="#deleteModal"
                        x-ref="btn_3" data-bs-toggle="modal" :disabled="checked.length === 0"
                        class="btn btn-gray-800 text-white">
                        <ion-icon class="text-danger" wire:ignore name="trash-bin"></ion-icon>
                    </button>

                </div>

            </div>



        </div>


        <div class="col-12 col-lg-6 col-xl-6 d-flex justify-content-lg-end search-task">

            <input type="text" class="form-control  w-100 " placeholder="Search Tasks Here" aria-label="Search"
                aria-describedby="basic-addon3" wire:model.live.debounce.500ms='search'>








        </div>

    </div>

    {{-- List navigation --}}
    @include('layouts.task-navigation')


    {{-- Status --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error-message'))
        <div class="alert alert-danger">
            {{ session('error-message') }}
        </div>
    @endif



    {{-- Content --}}
    <div class="task-wrapper  bg-white shadow border-0 rounded my-4  ">
        <div class="px-2 py-2 border-bottom d-flex justify-content-between" x-data="{
            checkAll: @entangle('taskChecked'),
            clicked: false
        }"
            x-init="$watch('clicked', (v) => {
                if (v === true) {
                    checkAll = @json($tasks->pluck('id'));

                } else {
                    checkAll = [];
                }
            });

            $wire.on('closeModal', (e) => clicked = false)
            ''">


            <button @click="clicked = !clicked" :class="clicked === true ? 'active' : ''"
                class="btn btn-secondary btn-pill" type="button" id="check-all" data-bs-toggle="tooltip"
                title="Select all"><ion-icon name="checkbox" wire:ignore></ion-icon></button>
            <div class="d-flex align-items-center mx-4">
                <div class="spinner-border spinner-border-sm my-2" role="status" wire:loading wire:target="search">
                    <span class="visually-hidden">Loading...</span>
                </div>

                <span class="ms-2 fs--0" wire:loading wire:target="search">Searching...</span>
            </div>
        </div>
        @if ($tasks->count() === 0)
            <div class="card-body">
                <div class="alert alert-warning ">No tasks available!</div>
            </div>
        @endif
        @foreach ($tasks as $task)
            <div class="card hover-state border-bottom rounded-0 rounded-top-0 py-3" x-data="{
                checked: false,
                checkInput: @entangle('taskChecked'),
                status: null,
            }"
                x-init="status = '{{ $task->status }}';">


                <div class="card-body   ">
                    <div class="row">
                        <div class="col-2 col-xl-1 col-lg-1 col-md-1 text-left text-sm-center mb-2 mb-sm-0">
                            <div class="form-check check-lg inbox-check me-sm-2"><input class="form-check-input"
                                    type="checkbox" wire:key='check_{{ $task->id }}' x-model="checkInput"
                                    :value="{{ $task->id }}" x-bind:checked="checked === true ? 'checked' : ''">

                            </div>
                        </div>
                        <div class="col-10 col-xl-10 col-lg-10 col-md-10 px-0 mb-4 mb-md-0">
                            <div class="mb-2">
                                <h3 class="h5 " :class="status === 'completed' ? 'line-through' : ''">
                                    {{ $task->name }}
                                </h3>

                                <div class="d-md-inline-flex d-sm-inline-block">
                                    <span class="date-category d-flex align-items-center mx-2">
                                        <ion-icon wire:ignore name="calendar-outline" class="me-1"></ion-icon>
                                        {{ \Carbon\Carbon::parse($task->finished_date)->format('j M, Y') }}
                                    </span>

                                    <span class="d-flex align-items-center mx-2"> <span
                                            :class="status === 'inprogress' ? 'progress-inprogress' : '' ||
                                                status === 'completed' ?
                                                'progress-complete' : '' || status === 'overdue' ?
                                                'progress-overdue' : ''"></span>
                                        <span x-text="status.charAt(0).toUpperCase() + status.slice(1)"></span>
                                    </span>
                                    <span class="d-flex align-items-center mx-2">
                                        <ion-icon wire:ignore name="grid" class="me-1"></ion-icon>
                                        {{ $task->category }}
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-xl-1 col-lg-1 col-md-12 ">
                            <div class="dropdown" x-data="{ checked: @entangle('taskChecked') }">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    :disabled="checked.length >= 1">
                                    <ion-icon wire:ignore name="ellipsis-horizontal" class="fs-4"></ion-icon><span
                                        class="visually-hidden">Toggle
                                        Dropdown</span>
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                    <a class="dropdown-item d-flex align-items-center" wire:navigate
                                        href="{{ route('edit-task', $task->id) }}">
                                        <ion-icon wire:ignore name="create" class="fs-5 me-2"></ion-icon> Edit
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#"
                                        data-bs-toggle="modal"
                                        @click="$dispatch('task-action', {id: ['{{ $task->id }}']})"
                                        data-bs-target="#deleteModal">
                                        <ion-icon wire:ignore name="trash" class="fs-5 me-2 text-danger"></ion-icon>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>



            </div>
        @endforeach

        @if ($tasks->hasPages())
            <div class="row p-4 ">

                <div class="col-7 mt-1">Showing
                    <span class="fw-semibold">{{ $tasks->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $tasks->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $tasks->total() }}</span>
                    {!! __('results') !!}
                </div>


                <div class="col-5">

                    <div class="btn-group float-end">
                        @if ($tasks->onFirstPage())
                            <button type="button" class="btn btn-gray-100 disabled" wire:loading.attr="disabled"
                                wire:click='goPreviousPage'>
                                <ion-icon name="chevron-back-outline" wire:ignore></ion-icon>
                            </button>
                        @else
                            <button type="button" class="btn btn-gray-100" wire:loading.attr="disabled"
                                wire:click='goPreviousPage'>
                                <ion-icon name="chevron-back-outline" wire:ignore></ion-icon>
                            </button>
                        @endif




                        @if ($tasks->onLastPage())
                            <button wire:loading.attr="disabled" type="button" class="btn btn-gray-800 disabled"
                                wire:click='goNextPage()'>
                                <ion-icon name="chevron-forward-outline" wire:ignore></ion-icon>
                            </button>
                        @else
                            <button wire:loading.attr="disabled" type="button" class="btn btn-gray-800"
                                wire:click='goNextPage()'>
                                <ion-icon name="chevron-forward-outline" wire:ignore></ion-icon>
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @endif
    </div>



    <!-- Delete -->
    <div wire:ignore class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true" x-data="{
            checked: @entangle('taskChecked'),
            values: [],

        }"
        @task-action.window="values = ($event.detail.id);">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <p class="text-center">
                            <ion-icon name="alert-circle-outline" class="text-muted fs-1"></ion-icon>
                        </p>
                    </div>

                    <div class="row">

                        <p class="text-center" x-show="checked.length === 0 || checked.length ===1 ">Are you sure you
                            want
                            to delete this task?</p>

                        <p class="text-center" x-show="checked.length > 1">Are you sure you want
                            to delete these tasks?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center border-top-0" x-data>
                    <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-danger px-5" @click="$wire.taskAction('delete', values);"
                        data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Archive -->
    <div wire:ignore class="modal fade" id="archiveModal" tabindex="-1" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true" x-data="{
            checked: @entangle('taskChecked'),
            values: [],

        }"
        @task-action.window="values = ($event.detail.id);">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <p class="text-center">
                            <ion-icon name="alert-circle-outline" class="text-muted fs-1"></ion-icon>
                        </p>
                    </div>

                    <div class="row">

                        <p class="text-center" x-show="checked.length === 0 || checked.length ===1 ">Are you sure you
                            want
                            to archive this task?</p>

                        <p class="text-center" x-show="checked.length > 1">Are you sure you want
                            to archive these tasks?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center border-top-0" x-data>
                    <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-secondary px-5"
                        @click="$wire.taskAction('archived', values);" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Mark -->
    <div wire:ignore class="modal fade" id="archiveModal" tabindex="-1" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true" x-data="{
            checked: @entangle('taskChecked'),
            values: [],

        }"
        @task-action.window="values = ($event.detail.id);">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <p class="text-center">
                            <ion-icon name="alert-circle-outline" class="text-muted fs-1"></ion-icon>
                        </p>
                    </div>

                    <div class="row">

                        <p class="text-center" x-show="checked.length === 0 || checked.length ===1 ">Are you sure you
                            want
                            to archive this task?</p>

                        <p class="text-center" x-show="checked.length > 1">Are you sure you want
                            to archive this tasks?</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center border-top-0" x-data>
                    <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-danger px-5" @click="$wire.taskAction('marked', values);"
                        data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore class="modal fade" id="markModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true" x-data="{
            checked: @entangle('taskChecked'),
            values: [],
            type: '',

        }"
        @task-action-mark.window="values = ($event.detail.id); type = $event.detail.type">
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <p class="text-center">
                            <ion-icon name="alert-circle-outline" class="text-muted fs-1"></ion-icon>
                        </p>
                    </div>

                    <div class="row">

                        <p class="text-center" x-show="checked.length === 0 || checked.length ===1 ">Are you sure you
                            want
                            to mark this task as <span x-text="type"></span>?</p>

                        <p class="text-center" x-show="checked.length > 1">Are you sure you want
                            to mark these tasks as <span x-text="type" class="badge"
                                :class="(type ==='completed' ? 'bg-success' : '') || (type ==='inprogress' ? 'bg-secondary' :
                                    '') || (type ==='overdue' ? 'bg-danger' : '')"></span>
                            ?
                        </p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center border-top-0" x-data>
                    <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-success px-5"
                        @click="$wire.taskAction('marked', values, type);" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
