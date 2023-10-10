<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <h2>All Users ig</h2>
    <h3>Ordered by id</h3>
    @if ($users->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>
                    <strong>ID: </strong> {{ $user->id }} <br>
                    <strong>Name: </strong> {{ $user->fullname }}<br>
                    <strong>Phone number: </strong> {{ $user->phone_number }}<br>
                    <strong>Email: </strong> {{ $user->email }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
</body>
</html>