<button type="{{ $type ?? 'button' }}" class="btn btn-sm btn-{{ $color ?? 'success' }} {{ $class ?? '' }}">
    <i class="{{ $icon ?? 'fas fa-save' }}"></i> {{ $slot }}
</button>