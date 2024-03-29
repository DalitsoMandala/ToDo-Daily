@if (count($enabledFilters))
    <div class="pg-enabled-filters-base">
        @if (count($enabledFilters) > 1)
            <span class="group pg-enabled-filters-span">
                {{ trans('livewire-powergrid::datatable.buttons.clear_all_filters') }}
                <div class="relative flex items-center w-2 h-2">
                    <button
                        wire:click.prevent="clearAllFilters"
                        type="button"
                    >
                        <x-livewire-powergrid::icons.x class="w-4 h-4" />
                    </button>
                </div>
            </span>
        @endif
        @foreach ($enabledFilters as $field => $filter)
            @isset($filter['label'])
                <span
                    wire:key="enabled-filters-{{ $field }}"
                    class="group pg-enabled-filters-span"
                >
                    {{ $filter['label'] }}
                    <div class="relative flex items-center w-2 h-2">
                        <button
                            wire:click.prevent="clearFilter('{{ $field }}')"
                            type="button"
                        >
                            <x-livewire-powergrid::icons.x class="w-4 h-4" />
                        </button>
                    </div>
                </span>
            @endisset
        @endforeach
    </div>
@endif
