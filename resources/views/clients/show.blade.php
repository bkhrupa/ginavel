@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'Client - ' . $name])

        @component('components.show-row', ['label' => __('form.name')])
            {{ $name }}
        @endcomponent

        @component('components.show-row', ['label' => __('form.email')])
            {{ $email }}
        @endcomponent

        @component('components.show-row', ['label' => __('form.email')])
            {{ $phone }}
            @if($phone)
                <a href="tel:{{ $phone }}"><i class="fa fa-phone"></i></a>
            @endif
        @endcomponent

        @component('components.show-row', ['label' => __('form.note')])
            {{ $note }}
        @endcomponent

        @component('components.show-row', ['label' => __('form.updated_at')])
            {{ $updated_at }}
        @endcomponent

        @component('components.show-row', ['label' => __('form.created_at')])
            {{ $created_at }}
        @endcomponent

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="{{ route('client.index') }}">
                    Clients
                </a>
            </div>
        </div>

    @endcomponent
@endsection
