<div class="form-group row">
    <label class="col-sm-3 col-form-label">{{ $label }}</label>

    <div class="col-sm-8">
        <textarea class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>

        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
