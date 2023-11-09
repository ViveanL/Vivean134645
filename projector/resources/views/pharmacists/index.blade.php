@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Pharmacist</h2>
    <form action="{{ route('pharmacists.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Add Pharmacist</button>
    </form>
</div>
@endsection
