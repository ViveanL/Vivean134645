@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Completed Orders</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Completed At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($completedOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->completed_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No completed orders available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
