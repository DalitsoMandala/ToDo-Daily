<div x-data="{

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

        console.log(event.detail.value);
      //  $wire.set('tasks', event.detail.value);
    },
    false,
);">

    <input id="taskInput" class="form-control" value="" placeholder="Enter something" x-ref="input"
        wire:model.live="tasks">

</div>
