<div class="form-group row">
    <label class="col-sm-3 col-form-label">{{ $label }}</label>

    <div class="col-sm-8">
        <select class="custom-select {{ $errors->has($name) ? 'is-invalid' : '' }}" name="{{ $name }}">
            @foreach($options as $optionKey => $optionValue)
                @php($selected = '')

                @if (old($name, $value) == $optionKey)
                    @php($selected = 'selected')
                @endif

                <option value="{{ $optionKey }}" {{ $selected }}>{{ $optionValue }}</option>
            @endforeach
        </select>

        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>

</div>

