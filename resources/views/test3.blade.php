<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <h2>All Companies ig</h2>
    @if ($companies->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($companies as $company)
                <li>
                    <strong>ID: </strong> {{ $company->id }} <br>
                    <strong>Company Name: </strong> {{ $company->name }}<br>
                    <strong>Adress: </strong> {{ $company->address }}<br>
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
</body>
</html>