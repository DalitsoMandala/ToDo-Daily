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

                                <div>

                                    <input id="taskInput" class="form-control" placeholder="Enter something"
                                        x-ref="input" wire:model="task" autofocus>



                                </div>

                                @error('task')
                                    <small class="text-danger d-block d-flex align-items-center" wire:ignore> <ion-icon
                                            name="alert-circle-outline"
                                            class="me-2"></ion-icon>{{ $message }}</small>
                                @enderror


                            </div>

                            <div class="mb-3" x-data="{
                                openCategory: @entangle('openCategory'),
                                toggleForm() {
                                    this.openCategory = !this.openCategory;
                                },
                                categoryAlpineModel: '',
                                category: @entangle('category'),
                            }">



                                <div wire:ignore x-init="const taskCategory = document.querySelector('#taskCategory');
                                const choiceCategory = new Choices(taskCategory, { removeItemButton: true });
                                
                                choiceCategory.setChoiceByValue([`${category}`]);
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
                                
                                    //   choiceCategory.removeActiveItems();
                                });
                                
                                
                                
                                
                                $watch('categoryAlpineModel', (e) => {
                                    $wire.chooseCategory(e.value);
                                    if (e.value === '') {
                                        $wire.chooseCategory(null);
                                    }
                                
                                
                                
                                
                                
                                
                                
                                })">


                                    <select class="form-select" id="taskCategory" x-model="categoryAlpineModel">
                                        <option value="" selected>Select category</option>
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


    @script
        <script>
            date = $wire.dueDate;
            flatpickr(".anotherSelector", {
                defaultDate: "" + date + "",
            });
        </script>
    @endscript


</div>
