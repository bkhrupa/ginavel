@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $user->name }}</div>

        <div class="panel-body">
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
        </div>
    </div>
@endsection
