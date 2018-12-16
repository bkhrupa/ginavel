<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ $label }}</label>

    <div class="col-md-6">
        <select id="{{ $name }}" class="form-control" name="{{ $name }}">
            @foreach($options as $optionKey => $optionValue)
                @php($selected = '')

                @if (old($name, $value) == $optionKey)
                    @php($selected = 'selected')
                @endif

                <option value="{{ $optionKey }}" {{ $selected }}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @if ($errors->has($name))
            <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
