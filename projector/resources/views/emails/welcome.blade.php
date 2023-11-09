<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Chain and Inventory Tool</title>
    <style>
        body {
            background-color: white;
            text-align: center;
        }

        h1 {
            color: blueviolet;
        }
        h2 {
            color: blueviolet;
        }

        a {
            display: block;
            width: 100px;
            margin: 0 auto;
            text-decoration: none;
            color: blueviolet;
            font-weight: bold;
            padding: 10px;
            border: 2px solid green;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        form {
            margin: 0 auto;
            display: inline-block;
        }

        button {
            background-color:blueviolet;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Supply Chain and Inventory Tool</h1>
    <h2>Healthcare</h2>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>
    @else
    <a href="/register">Register</a>
    <a href="/login">Login</a>

    @endauth

   

</body>
</html>
