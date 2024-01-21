<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <style>
        .choices__item {
            color: black;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center py-3">

            <div class="col-12 col-lg-7 vh-100">
                <div class="d-flex justify-content-center my-2">
                    <a href="{{ route('tasks') }}" wire:navigate class="nav-link ">
                        <- Back to tasks </a>
                </div>
                <form wire:submit="save">




                    <div class="card">
                        <div class="card-body p-5">
                            <div class="mb-3">
                                <label for="" class=" form-label">Enter task(s) here</label>

                                <div wire:ignore x-data="{

                                }" x-init="const element = $refs.input;
                                const choiceTask = new Choices(element, {
                                    delimiter: ',',
                                    editItems: true,
                                    placeholder: true,
                                    removeItemButton: true,
                                });

                                element.addEventListener(
                                    'addItem',
                                    function(event) {
                                        // do something creative here...
                                        $wire.addTask({
                                            id: event.detail.id,
                                            value: event.detail.value
                                        });


                                    },
                                    false,
                                );

                                element.addEventListener(
                                    'removeItem',
                                    function(event) {
                                        // do something creative here...
                                        $wire.deleteTask(event.detail.id);

                                    },
                                    false,
                                );

                                $wire.on('saved', (event) => {

                                    choiceTask.clearStore();
                                });">

                                    <input id="taskInput" class="form-control" value=""
                                        placeholder="Enter something" x-ref="input" wire:model="tasks">



                                </div>

                                @error('tasks')
                                    <small class="text-danger d-block d-flex align-items-center" wire:ignore> <ion-icon
                                            name="alert-circle-outline"
                                            class="me-2"></ion-icon>{{ $message }}</small>
                                @enderror


                            </div>

                            <div class="mb-3" x-data="{
                                openCategory: @entangle('openCategory'),
                                toggleForm() {
                                    this.openCategory = !this.openCategory;
                                }
                            }">


                                <div wire:ignore x-data="{

                                }" x-init="const taskCategory = document.querySelector('#taskCategory');
                                const choiceCategory = new Choices(taskCategory, { removeItemButton: true });
                                $wire.on('category-added', (event) => {
                                    let category_name = event.name;
                                    let category_id = event.id;
                                    category_name = category_name.charAt(0).toUpperCase() + category_name.slice(1);
                                    choiceCategory.setChoices(
                                        [
                                            { value: category_id, label: category_name },
                                        ],
                                        'value',
                                        'label',
                                        false,
                                    );
                                });

                                $wire.on('saved', (event) => {

                                    choiceCategory.removeActiveItems();
                                });">


                                    <select class="form-select" id="taskCategory" wire:model='category'>
                                        <option value="">Select category</option>
                                        @foreach ($taskCategory as $tsk_category)
                                            <option value="{{ $tsk_category->id }}">{{ $tsk_category->name }}</option>t
                                        @endforeach

                                    </select>
                                </div>
                                @error('category')
                                    <small class="text-danger d-block d-flex align-items-center" wire:ignore> <ion-icon
                                            name="alert-circle-outline"
                                            class="me-2"></ion-icon>{{ $message }}</small>
                                @enderror


                                <div class="text-end">
                                    <a href="#" data-bs-toggle="button" class="text-default form-text my-4 "
                                        @click="toggleForm()">Add new category
                                        +</a>
                                </div>
                                <div class="card card-body mt-2 " x-show="openCategory">
                                    <input type="text" wire:model='newCategory' id="" class="form-control"
                                        placeholder="Category name..." aria-describedby="helpId" />


                                    @error('newCategory')
                                        <small class="text-danger d-block d-flex align-items-center" wire:ignore> <ion-icon
                                                name="alert-circle-outline"
                                                class="me-2"></ion-icon>{{ $message }}</small>
                                    @enderror
                                    <div class=" d-flex justify-content-end my-2">
                                        <button type="button" class="btn btn-gray-200 me-2" @click="toggleForm()">
                                            Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary" wire:click='saveCategory'>
                                            Save
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">

                                        <label for="">Due date</label>

                                        <input type="text" class="form-control datepicker-input anotherSelector"
                                            placeholder="YYYY-MM-DD" wire:model="dueDate">




                                        @error('dueDate')
                                            <small class="text-danger d-block d-flex align-items-center" wire:ignore>
                                                <ion-icon name="alert-circle-outline"
                                                    class="me-2"></ion-icon>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">



                                        <label for="">Status</label>
                                        <select class="form-select " wire:model="status">

                                            <option value="inprogress" selected> Inprogress</option>
                                            <option value="completed">Completed</option>
                                            <option value="overdue">Overdue</option>
                                        </select>


                                        @error('status')
                                            <small class="text-danger d-block d-flex align-items-center" wire:ignore>
                                                <ion-icon name="alert-circle-outline"
                                                    class="me-2"></ion-icon>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="card-footer border-top-0">
                            <div class="mb-3 mt-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" name="" id="" class="btn btn-primary"
                                        wire:loading.attr="disabled">
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr(".anotherSelector");
        </script>
    @endpush
</div>
