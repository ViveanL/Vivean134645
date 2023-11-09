@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Inventory Item</h2>

    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $inventory->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $inventory->quantity }}" required>
        </div>
        <!-- Add more input fields as needed -->

        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>
@endsection
