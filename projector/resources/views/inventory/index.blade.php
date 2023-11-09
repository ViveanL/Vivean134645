@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory Manager</h2>
    <a href="{{ route('inventory.create') }}" class="btn btn-primary mb-2">Add Inventory Item</a>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventoryItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <!-- Add more actions like delete as needed -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No inventory items available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
