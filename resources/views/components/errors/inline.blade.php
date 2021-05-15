@props(['key'])

@error($key)
    <div class="text-sm text-red-500">
        {{ $message }}
    </div>
@enderror