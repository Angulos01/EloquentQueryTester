<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON :0</title>
</head>
<body>
    <form method="post" action="{{ url('/buttonSend') }}">
        @csrf
        <button type="submit">Send Message</button>
    </form>
</body>
</html>