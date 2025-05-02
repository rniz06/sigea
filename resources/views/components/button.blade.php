<button type="{{ $type ?? 'button' }}" class="btn btn-sm btn-{{ $color ?? 'success' }} {{ $class ?? '' }}" @if (isset($click)) wire:click="{{ $click }}" @endif @disabled($disabled ?? false)>
    <i class="{{ $icon ?? 'fas fa-save' }}"></i> {{ $slot }}
</button>