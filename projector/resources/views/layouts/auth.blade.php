<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your App Title</title>
    <!-- Include your stylesheets, scripts, or other head elements here -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Your App</a>
        <!-- Include your navigation links or other navbar content here -->
    </nav>

    <div class="container mt-5">
        @yield('content') <!-- This is where the content from other views will be injected -->
    </div>

    <!-- Include your scripts or other body elements here -->
</body>

</html>
