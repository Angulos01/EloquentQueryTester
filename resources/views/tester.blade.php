<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tester</title>
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico" />
    <link rel="canonical" href="https://picocss.com/examples/basic-template/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />
    <link rel="stylesheet" href="css/custom.css" />
  </head>
  <body>
    <header class="container">
    <h1>Eloquent Query Tester</h1>

    <form method="POST" action="{{ route('execute-query') }}">
        @csrf
        <label for="eloquent_query">Enter Eloquent Query:</label>
        <input type="text" id="eloquent_query" name="eloquent_query" placeholder="User::orderBy('id')->get();" required>
        <button type="submit">Execute Query</button>
    </form>

    <h2>Result:</h2>
    @if(isset($message))
        Wow
        <p>{{ $message }}</p>
    @endif
    @if(isset($message2))
        <p>{{ $message2 }}</p>
    @endif
    @if(isset($results))
    Dayum
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
    </header>
  </body>
</html>
