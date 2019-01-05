@extends('layouts.app')


@section('content')
    @component('components.card', ['header' => 'New Order'])

        <form class="form-horizontal" method="POST" action="{{ route('order.store') }}">
            {{ csrf_field() }}

            @include(
                'partials.form.datepicker-yyyy-mm-dd',
                ['name' => 'due_date', 'label' => 'Due Date', 'value' => null]
            )

            @include(
            'partials.form.select',
            [
                'name' => 'client_id',
                'label' => 'Client',
                'value' => '',
                'options' => App\Models\Client::query()->pluck('name', 'id')->prepend('', '')
            ]
            )

            @include('partials.form.textarea', ['name' => 'note', 'label' => 'Note', 'value' => null])

            <h4 class="text-center">Enter products quantity</h4>

            @if ($errors->has('products'))
                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <span class="help-block">
                            <strong>{{ $errors->first('products') }}</strong>
                        </span>
                    </div>
                </div>
            @endif

            @foreach($products as $product)
                @include(
                'partials.form.product-quantity',
                 [
                     'label' => $product->name,
                     'value' => null,
                     'id' => $product->id,
                     'price' => $product->price
                 ]
                 )
            @endforeach

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>

                    <a class="btn btn-link" href="{{ route('product.index') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    @endcomponent
@endsection
