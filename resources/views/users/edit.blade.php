@extends('layouts.app')


@section('content')
    @component('components.card', ['header' => 'Edit User - ' . $user->name])

        <form class="form-horizontal" method="POST" action="{{ route('user.update', $user->id) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">

            @include('partials.form.text', ['name' => 'name', 'label' => 'User Name', 'value' => $user->name])

            @include('partials.form.text', ['name' => 'email', 'label' => 'Email', 'value' => $user->email])

            @include('partials.form.password', ['name' => 'password', 'label' => 'Password', 'value' => null])

            @include('partials.form.password', ['name' => 'password_confirmation', 'label' => 'Password Confirmation', 'value' => null])

            @include(
            'partials.form.select',
            [
                'name' => 'role',
                'label' => 'Role',
                'value' => $user->role,
                'options' => App\Models\User::$roles
            ]
            )

            @include(
            'partials.form.select',
            [
                'name' => 'client_id',
                'label' => 'Client',
                'value' => optional($user->client)->id,
                'options' => App\Models\Client::query()->pluck('name', 'id')->prepend('', '')
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

    @endcomponent
@endsection
