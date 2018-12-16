@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">New Order</div>

        <div class="panel-body">
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
@endsection
