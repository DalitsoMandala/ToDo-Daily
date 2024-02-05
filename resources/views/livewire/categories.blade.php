<div>

    <style>
        .pg-actions {
            display: flex;
            gap: 1em;

        }
    </style>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:category-table :search="$searchedCategory" />
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal trigger button -->
        <button type="button" class="btn btn-primary btn-lg editCategory" hidden data-bs-toggle="modal"
            data-bs-target="#editCategory">
            Launch
        </button>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" wire:ignore.self id="editCategory" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">
                            Edit Category
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit='save'>
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="" wire:model='name' id=""
                                    class="form-control" placeholder="" aria-describedby="helpId" />
                                @error('name')
                                    <small class="text-danger d-block d-flex align-items-center" wire:ignore>
                                        <ion-icon name="alert-circle-outline"
                                            class="me-2"></ion-icon>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">

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

                            <div class="mb-3">
                                <label for="">Due date</label>

                                <input type="text" class="form-control " wire:model='dueDate' id="dueDate"
                                    placeholder="YYYY-MM-DD">




                                @error('dueDate')
                                    <small class="text-danger d-block d-flex align-items-center" wire:ignore>
                                        <ion-icon name="alert-circle-outline"
                                            class="me-2"></ion-icon>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>


        <!-- Modal trigger button -->
        <button type="button" class="btn btn-primary btn-lg deleteCategory" hidden data-bs-toggle="modal"
            data-bs-target="#deleteCategory">
            Launch
        </button>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" wire:ignore id="deleteCategory" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="modalTitleId">
                            Delete Category
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Are you sure you
                            want
                            to delete this category?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center border-top-0" x-data>
                        <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger px-5" wire:click='delete'
                            data-bs-dismiss="modal">Confirm</button>
                    </div>
                </div>
            </div>
        </div>



    </div>




    @script
        <script>
            $wire.on('editCategoryModal', (e) => {
                document.querySelector('.editCategory').click();
                $wire.name = e.name;
                $wire.status = e.status;
                console.log(e.status);
                $wire.dueDate = e.dueDate;
            })

            $wire.on('deleteCategoryModal', (e) => {
                document.querySelector('.deleteCategory').click();

            })
            $wire.on('saved', (e) => {
                document.querySelector('.btn-close').click();
            })

            const myInput = document.querySelector("#dueDate");
            flatpickr(myInput);
        </script>
    @endscript


</div>
