@extends('layouts.app') {{-- Assuming you are extending a master layout named 'app' --}}

@section('content') {{-- Define a section called 'content' --}}

<div class="container">
    <h1>Welcome to Our Website</h1>
    <p>This is the body content of your webpage. You can customize this section according to your needs.</p>

    <h2>Latest Articles</h2>
    <ul>
        <li><a href="#">Article 1</a></li>
        <li><a href="#">Article 2</a></li>
        <li><a href="#">Article 3</a></li>
    </ul>

    <div class="alert alert-info" role="alert">
        <strong>Heads up!</strong> This is an informational message.
    </div>

    <button class="btn btn-primary">Click Me</button>

    <!-- Add more HTML elements and content as needed -->

</div>

@endsection {{-- End of 'content' section --}}
