@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pending Orders</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendingOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('orders.details', $order->id) }}" class="btn btn-sm btn-info">Details</a>
                    <!-- Add more actions as needed -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No pending orders available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
