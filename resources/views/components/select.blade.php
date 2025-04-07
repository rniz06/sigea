<div class="form-group row">
    <label class="col-sm-2 col-form-label">{{ $label ?? 'campo' }}:</label>
    <div class="col-sm-10">
        <select class="{{ $classes ?? 'form-control' }}" name="{{ $name }}"
            @if (isset($id)) id="{{ $id }}" @endif>
            {{ $slot }}
        </select>
    </div>
</div>
@if ($errors->has($name))
    <div class="alert alert-danger">
        {{ $errors->first($name) }}
    </div>
@endif