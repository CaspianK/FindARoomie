@props(['errors'])

@if ($errors->any())
    <div>
        <p class="text">
            {{ __('Something went wrong.') }}
        
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li class="text">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
