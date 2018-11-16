@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <hr/>

                    <pre>
features:
    users
    products
    customers
    orders (new, in progress, delivered, wait payment)
    orders log (new, in progress, delivered, wait payment, paid)
    statistics

                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
