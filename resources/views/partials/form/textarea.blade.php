<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="name" class="col-md-3 control-label">{{ $label }}</label>

    <div class="col-md-8">
        <textarea id="{{ $name }}" class="form-control" name="{{ $name }}">{{ old($name, $value) }}</textarea>

        @if ($errors->has($name))
            <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
