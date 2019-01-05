<div class="form-group row">
    <label class="col-sm-3 col-form-label">{{ $label }}</label>

    <div class="col-sm-8">
        <datepicker
                id="{{ $name }}"
                name="{{ $name }}"
                format="yyyy-MM-dd"
                bootstrap-styling="true"
                value="{{ old($name, $value) }}"
                input-class="{{ $errors->has($name) ? 'is-invalid' : '' }}"
        ></datepicker>

        @if ($errors->has($name))
            <div class="invalid-feedback d-block">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
