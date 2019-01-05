@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'Dashboard'])

        @include('partials.home.orders')

    @endcomponent
@endsection
