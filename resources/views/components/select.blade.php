<div class="col-4">
    <label class="">{{ $label ?? 'campo' }}:</label>
        <select class="{{ $classes ?? 'form-control' }}"
            @if(isset($multiple)) multiple @endif
            @if (isset($required) && $required) required @endif 
            @if (isset($campo)) wire:model.live="{{ $campo }}" @endif
            @if (isset($id)) id="{{ $id }}" @endif
            @disabled($disabled ?? false)>
            {{ $slot }}
        </select>
</div>
@if ($errors->has($campo))
    <div class="alert alert-danger">
        {{ $errors->first($campo) }}
    </div>
@endif