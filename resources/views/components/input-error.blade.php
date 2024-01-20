@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'px-0 pb-0']) }}>
        <div class="alert alert-danger list-unstyled" role="alert">
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </div>
    </ul>
@endif
