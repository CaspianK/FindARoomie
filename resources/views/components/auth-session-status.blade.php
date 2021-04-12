@props(['status'])

@if ($status)
    <p class="text">
        {{ $status }}
    </p>
@endif
