<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ $label }}</label>

    <div class="col-md-6">
        <datepicker
                id="{{ $name }}"
                name="{{ $name }}"
                format="yyyy-MM-dd"
                bootstrap-styling="true"
                value="{{ old($name, $value) }}"
        ></datepicker>

        @if ($errors->has($name))
            <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
