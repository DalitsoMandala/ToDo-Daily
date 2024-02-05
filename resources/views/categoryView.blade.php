<!-- Hover added -->

<div class="list-group">
    <a href="#"
        class="list-group-item list-group-item-action active disabled d-flex justify-content-between align-items-center"><span>Tasks</span><span
            class="badge bg-secondary">{{ \App\Models\TaskCategory::find($row->id)->tasks->count() }}</span> </a>

    @foreach (\App\Models\TaskCategory::find($row->id)->tasks as $task)
        <a href="/edit-task/{{ $task->id }}" class="list-group-item list-group-item-action" x-data="{
            status: '{{ $task->status }}',
        }">
            <div class="mb-2 d-flex justify-content-between">
                <p class=" " :class="status === 'completed' ? 'line-through' : ''">{{ $task->name }}
                </p>

                <div class="d-inline-flex">
                    <span class="date-category d-flex align-items-center mx-2">
                        <i wire:ignore class="me-1 bx bx-calendar"></i>

                        {{ \Carbon\Carbon::parse($task->finished_date)->format('j M, Y') }}
                    </span>

                    <span class="d-flex align-items-center mx-2"> <span
                            :class="status === 'inprogress' ? 'progress-inprogress' : '' ||
                                status === 'completed' ?
                                'progress-complete' : '' || status === 'overdue' ? 'progress-overdue' : ''"></span>
                        <span x-text="status.charAt(0).toUpperCase() + status.slice(1)"></span>
                    </span>

                </div>
            </div>
        </a>
    @endforeach


</div>
