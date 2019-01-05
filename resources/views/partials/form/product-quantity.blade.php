@php
    $hasError = false;

    if($errors->has('products.' . $id . '.id') || $errors->has('products.' . $id . '.quantity')) {
        $hasError = true;
    }
@endphp

<div class="form-group row">
    <label class="col-sm-3 col-form-label">{{ $label }} ({{ $price }})</label>

    <div class="col-sm-8">
        <input type="number" step="0.1" min="0" class="form-control {{ $hasError ? 'is-invalid' : '' }}" name="products[{{ $id }}][quantity]"
               value="{{ old('products.' . $id . '.quantity', $value) }}">
        <input type="hidden" name="products[{{ $id }}][id]" value="{{ $id }}">

        @if ($errors->has('products.' . $id . '.quantity'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('products.' . $id . '.quantity') }}
            </div>
        @endif
        @if ($errors->has('products.' . $id . '.id'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('products.' . $id . '.id') }}
            </div>
        @endif
    </div>
</div>
