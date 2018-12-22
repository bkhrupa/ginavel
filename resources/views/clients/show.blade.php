@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Client - {{ $name }}</div>

        <div class="panel-body">
            @component('components.show-row', ['label' => 'Name'])
                {{ $name }}
            @endcomponent

            @component('components.show-row', ['label' => 'Email'])
                {{ $email }}
            @endcomponent

            @component('components.show-row', ['label' => 'Phone'])
                {{ $phone }}
                <a href="tel:{{ $phone }}"><i class="fa fa-phone"></i></a>
            @endcomponent

            @component('components.show-row', ['label' => 'Noet'])
                {{ $note }}
            @endcomponent

            @component('components.show-row', ['label' => 'Updated At'])
                {{ $updated_at }}
            @endcomponent

            @component('components.show-row', ['label' => 'Created At'])
                {{ $created_at }}
            @endcomponent

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default" href="{{ route('client.index') }}">
                        Clients
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
