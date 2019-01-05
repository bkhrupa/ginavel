@extends('layouts.app')


@section('content')
    @component('components.card', ['header' => 'New Client'])

        <form class="form-horizontal" method="POST" action="{{ route('client.store') }}">
            {{ csrf_field() }}

            @include('partials.form.text', ['name' => 'name', 'label' => 'Name', 'value' => null])

            @include('partials.form.text', ['name' => 'email', 'label' => 'Email', 'value' => null])

            @include('partials.form.text', ['name' => 'phone', 'label' => 'Phone', 'value' => null])

            @include('partials.form.textarea', ['name' => 'note', 'label' => 'Note', 'value' => null])

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>

                    <a class="btn btn-link" href="{{ route('client.index') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

    @endcomponent
@endsection
