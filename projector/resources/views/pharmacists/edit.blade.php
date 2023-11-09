@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pharmacist</h2>
    <form action="{{ route('pharmacists.update', $pharmacist->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the record -->

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pharmacist->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $pharmacist->email }}" required>
        </div>
        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Update Pharmacist</button>
    </form>
</div>
@endsection
