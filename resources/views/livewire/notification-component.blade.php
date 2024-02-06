<div x-data ="{
    count: '{{ $unreadCount }}'
}">

    <a class="nav-link text-dark notification-bell  dropdown-toggle" :class="count > 0 ? 'unread' : ''"
        data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static"
        aria-expanded="false" @click="$wire.readAll()">
        <i class='bx bxs-bell fs-3 text-body'></i>
    </a>
    <div class="py-0 mt-2 dropdown-menu dropdown-menu-lg dropdown-menu-center" wire:ignore.self>
        <div class="list-group list-group-flush">
            <a href="#"
                class="py-3 text-center text-primary fw-bold border-bottom border-light nav-link disabled ">Notifications</a>
            @foreach ($filteredNotifications as $notification)
                <!-- Display other notification details if needed -->


                <a href="{{ $notification->data['link'] }}"
                    class="list-group-item list-group-item-action border-bottom">
                    <div class="row align-items-center">
                        <div class="col-2  " x-data="{
                            type: '{{ $notification->type }}'
                        }">


                            <div :class="type === 'Task Completion' ? 'bg-success' : 'bg-danger'"
                                class=" fs-5 rounded-circle text-center">
                                <i class='bx  text-white '
                                    :class="type === 'Task Completion' ? 'bx-list-check' : 'bx-calendar-exclamation'"></i>
                            </div>

                        </div>
                        <div class="col ps-0 ms-2" x-data="{
                            message: '{{ $notification->data['message'] }}'
                        }">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0 h6 text-small">{{ $notification->type }}</h4>
                                </div>

                            </div>
                            <p class="mt-1 mb-0 font-small " style="font-size: 12px;">


                                <span x-html="message.length >= 150 ? message.slice(0,200)+'...' : message "></span>

                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

            @if ($filteredNotifications->count() === 0)
                <div class="list-group-item"> <i class="bx bx-bell-off"></i> No notifications available!</div>
            @endif
        </div>
    </div>

</div>
