<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Basic template • Pico.css</title>
    <meta
      name="description"
      content="A basic custom template for Pico using only CSS custom properties (variables). Built with Pico CSS."
    />
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico" />
    <link rel="canonical" href="https://picocss.com/examples/basic-template/" />

    <!-- Pico.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />

    <!-- Custom template-->
    <link rel="stylesheet" href="css/custom.css" />
  </head>
<body>
    <header class="container">
    @if ($result->isEmpty())
        <p>Pues no lmao</p>
    @else
    <section id="tables">
        <h2>Si hay result :]</h2>
        <figure>
            <table role="grid">
                <thead>
                    <tr>
                        @foreach (['id','department_id','title', 'created_at', 'updated_at', 'user_id', 'data', 'name', 'address', 'fullname', 'role_id', 'phone_number', 'email'] as $field)
                            <th scope="col">{{ $field }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $item)
                        <tr>
                            @foreach (['id','department_id','title', 'created_at', 'updated_at', 'user_id', 'data', 'name', 'address', 'fullname', 'role_id', 'phone_number', 'email'] as $field)
                                <td>
                                    @if (isset($item[$field]))
                                        {{ $item[$field] }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </figure>
    </section>
    @endif
    </header>
</body>
</html>
