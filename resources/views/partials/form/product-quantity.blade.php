@php
    $hasError = false;

    if($errors->has('products.' . $id . '.id') || $errors->has('products.' . $id . '.quantity')) {
        $hasError = true;
    }
@endphp

<div class="form-group{{ $hasError ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{ $label }} ({{ $price }})</label>

    <div class="col-md-6">
        <input type="number" step="0.1" class="form-control" name="products[{{ $id }}][quantity]" value="{{ old('products.' . $id . '.quantity', $value) }}">
        <input type="hidden" name="products[{{ $id }}][id]" value="{{ $id }}">

        @if ($errors->has('products.' . $id . '.quantity'))
            <span class="help-block">
            <strong>{{ $errors->first('products.' . $id . '.quantity') }}</strong>
            </span>
        @endif
        @if ($errors->has('products.' . $id . '.id'))
            <span class="help-block">
            <strong>{{ $errors->first('products.' . $id . '.id') }}</strong>
            </span>
        @endif
    </div>
</div>
