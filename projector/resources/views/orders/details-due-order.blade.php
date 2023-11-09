@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Due Order Details</h2>

    @if($dueOrder)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: {{ $dueOrder->id }}</h5>
            <p class="card-text">Customer Name: {{ $dueOrder->customer_name }}</p>
            <p class="card-text">Product Name: {{ $dueOrder->product_name }}</p>
            <p class="card-text">Quantity: {{ $dueOrder->quantity }}</p>
            <p class="card-text">Due Date: {{ $dueOrder->due_date }}</p>

            <!-- Add more details as needed -->

            <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
        </div>
    </div>
    @else
    <p>No due order found.</p>
    @endif
</div>
@endsection
