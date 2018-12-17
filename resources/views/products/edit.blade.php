@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Product - {{ $name }}</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('product.update', $id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                @include('partials.form.text', ['name' => 'name', 'label' => 'Product Name', 'value' => $name])

                @include('partials.form.integer', ['name' => 'price', 'label' => 'Price', 'value' => $price])

                @include('partials.form.textarea', ['name' => 'description', 'label' => 'Description', 'value' => $description])

                @include(
                'partials.form.select',
                [
                    'name' => 'status',
                    'label' => 'Status',
                    'value' => $status,
                    'options' => [
                        App\Models\Product::STATUS_ENABLED => 'Enabled',
                        App\Models\Product::STATUS_DISABLE => 'Disable',
                    ]
                ]
                )

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a class="btn btn-link" href="{{ route('product.index') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
