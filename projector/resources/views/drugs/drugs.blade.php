@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Drug Information</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Pharmacist ID</th>
                <th>Prescription ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drugs as $drug)
            <tr>
                <td>{{ $drug->order_id }}</td>
                <td>{{ $drug->order_date }}</td>
                <td>{{ $drug->status }}</td>
                <td>{{ $drug->pharmacist_id }}</td>
                <td>{{ $drug->prescription_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

