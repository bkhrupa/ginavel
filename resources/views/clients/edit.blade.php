@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Client - {{ $name }}</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('client.update', $id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                @include('partials.form.text', ['name' => 'name', 'label' => 'Name', 'value' => $name])

                @include('partials.form.text', ['name' => 'email', 'label' => 'Email', 'value' => $email])

                @include('partials.form.text', ['name' => 'phone', 'label' => 'Phone', 'value' => $phone])

                @include('partials.form.textarea', ['name' => 'note', 'label' => 'Note', 'value' => $note])

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a class="btn btn-link" href="{{ route('client.index') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
