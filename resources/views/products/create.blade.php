@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'New Product'])

        <form class="form-horizontal" method="POST" action="{{ route('product.store') }}">
            {{ csrf_field() }}

            @include('partials.form.text', ['name' => 'name', 'label' => 'Product Name', 'value' => null])

            @include('partials.form.integer', ['name' => 'price', 'label' => 'Price', 'value' => null])

            @include('partials.form.textarea', ['name' => 'description', 'label' => 'Description', 'value' => null])

            @include(
            'partials.form.select',
            [
                'name' => 'status',
                'label' => 'Status',
                'value' => App\Models\Product::STATUS_ENABLED,
                'options' => [
                    App\Models\Product::STATUS_ENABLED => 'Enabled',
                    App\Models\Product::STATUS_DISABLE => 'Disable',
                ]
            ]
            )

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
