@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'Todo'])

        <h3>TODO Features</h3>
        <h4>Users</h4>
        <ul>
            <li>
                <del>auth</del>
            </li>
            <li>
                <del>base crud</del>
            </li>
            <li>roles</li>
            <li>policies access</li>
        </ul>

        <h4>Products</h4>
        <ul>
            <li>
                <del>base crud</del>
            </li>
            <li>
                <del>prices history</del>
            </li>
            <li>prices history - crud</li>
            <li>photo</li>
            <li>photos gallery</li>
        </ul>

        <h4>Customers</h4>
        <ul>
            <li>
                <del>base crud</del>
            </li>
            <li>statistic</li>
            <li>ping functional</li>
            <li>allow login</li>
            <li>allow create orders</li>
        </ul>

        <h4>Orders</h4>
        <ul>
            <li>
                <del>base crud</del>
            </li>
            <li>
                <del>statuses - new, in progress, delivered, wait payment, done</del>
            </li>
            <li>orders log by products</li>
        </ul>


        <h4>Statistics</h4>
        <ul>summary</ul>
        <ul>
            by customer
            (
            <del>base orders count and last order</del>
        </ul>
        <ul>by products</ul>

        <h4>Pages
            <small>Without auth</small>
        </h4>
        <ul>
            <del>Products Price</del>
        </ul>
        <ul>Products Photos</ul>

    @endcomponent
@endsection
