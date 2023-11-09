@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Details</h2>

    @if($order)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $order->id }}</h5>
            <p class="card-text">Customer Name: {{ $order->customer_name }}</p>
            <p class="card-text">Product Name: {{ $order->product_name }}</p>
            <p class="card-text">Quantity: {{ $order->quantity }}</p>
            <p class="card-text">Order Date: {{ $order->created_at }}</p>

            <!-- Add more details as needed -->

            <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
        </div>
    </div>
    @else
    <p>No order found.</p>
    @endif
</div>
@endsection
