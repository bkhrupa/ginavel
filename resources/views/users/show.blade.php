@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => $user->name])

        @component('components.show-row', ['label' => 'Name'])
            {{ $user->name }}
        @endcomponent

        @component('components.show-row', ['label' => 'Email'])
            {{ $user->email }}
        @endcomponent

        @component('components.show-row', ['label' => 'Role'])
            {{ $user->role }}
        @endcomponent

        @if($user->client)
            @component('components.show-row', ['label' => 'Client'])
                <a href="{{ route('client.show', $user->client->id) }}">
                    {{ $user->client->name }}
                </a>
            @endcomponent
        @endif

        @component('components.show-row', ['label' => 'Updated At'])
            {{ $user->updated_at }}
        @endcomponent

        @component('components.show-row', ['label' => 'Created At'])
            {{ $user->created_at }}
        @endcomponent

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="{{ route('user.index') }}">
                    Users
                </a>
            </div>
        </div>

    @endcomponent
@endsection
