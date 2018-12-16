@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Product</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                'value' => null,
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
