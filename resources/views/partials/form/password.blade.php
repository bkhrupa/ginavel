<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ $label }}</label>

    <div class="col-md-8">
        <input id="{{ $name }}" type="password" class="form-control" name="{{ $name }}" value="{{ old($name, $value) }}">

        @if ($errors->has($name))
            <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
