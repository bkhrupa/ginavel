@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">

            @include('partials.home.orders')

        </div>
    </div>
@endsection
