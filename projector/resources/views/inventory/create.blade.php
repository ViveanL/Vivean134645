@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Inventory Item</h2>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <!-- Add more input fields as needed -->

        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection
