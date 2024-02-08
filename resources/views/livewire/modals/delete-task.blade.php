<div>

    <x-confirmation-modal wire:model='openModal'>
        <x-slot name="content">

            <div class="row">

                <p class="text-center">Are you sure you
                    want
                    to delete this task?</p>

                <p class="text-center">Are you sure you want
                    to delete this tasks?</p>
            </div>
        </x-slot>
        <x-slot name="footer" class="modal-footer d-flex justify-content-center border-top-0" x-data>
            <button type="button" class="btn btn-gray-300 px-5" data-bs-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal"
                wire:click="response('delete')">Confirm</button>
        </x-slot>

    </x-confirmation-modal>

    {{ var_export($data) }}

</div>
