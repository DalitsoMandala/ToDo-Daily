    <div class="d-flex justify-content-between">

        <h1 class="h3">Tasks</h1>
        <ul class="nav  " wire:ignore>
            <li class="nav-item mx-2">

                <a class="nav-link {{ Route::is('tasks') ? 'active btn btn-secondary' : '' }} " wire:navigate
                    aria-current="page" href="{{ route('tasks') }}">All</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link  btn {{ Route::is('inprogress-tasks') ? 'active btn btn-secondary' : '' }}  "
                    wire:navigate href="{{ route('inprogress-tasks') }}"><ion-icon wire:ignore
                        name="analytics"></ion-icon>
                    Inprogress </a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link btn {{ Route::is('completed-tasks') ? 'active btn btn-secondary' : '' }}"
                    wire:navigate href="{{ route('completed-tasks') }}"><ion-icon wire:ignore name="flash"></ion-icon>
                    Completed</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link btn {{ Route::is('overdue-tasks') ? 'active btn btn-secondary' : '' }}" wire:navigate
                    href="{{ route('overdue-tasks') }}" tabindex="-1" aria-disabled="true"><ion-icon wire:ignore
                        name="alert-circle"></ion-icon> Overdue</a>
            </li>
        </ul>
    </div>
