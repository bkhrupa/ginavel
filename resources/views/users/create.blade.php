@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">New User</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                {{ csrf_field() }}

                @include('partials.form.text', ['name' => 'name', 'label' => 'User Name', 'value' => null])

                @include('partials.form.text', ['name' => 'email', 'label' => 'Email', 'value' => null])

                @include('partials.form.password', ['name' => 'password', 'label' => 'Password', 'value' => null])

                @include('partials.form.password', ['name' => 'password_confirmation', 'label' => 'Password Confirmation', 'value' => null])

                @include(
                'partials.form.select',
                [
                    'name' => 'role',
                    'label' => 'Role',
                    'value' => null,
                    'options' => App\Models\User::$roles
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
@endsection
