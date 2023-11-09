@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pharmacists</h2>
    <a href="{{ route('pharmacists.create') }}" class="btn btn-primary mb-2">Add Pharmacist</a>

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
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pharmacists as $pharmacist)
            <tr>
                <td>{{ $pharmacist->id }}</td>
                <td>{{ $pharmacist->name }}</td>
                <td>{{ $pharmacist->email }}</td>
                <td>
                    <a href="{{ route('pharmacists.edit', $pharmacist->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('pharmacists.destroy', $pharmacist->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this pharmacist?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No pharmacists available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
