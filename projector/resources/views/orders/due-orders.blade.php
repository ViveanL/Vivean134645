@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Due Orders</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dueOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->due_date }}</td>
                <td>
                    <a href="{{ route('orders.details', $order->id) }}" class="btn btn-sm btn-info">Details</a>
                    <!-- Add more actions as needed -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No due orders available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
