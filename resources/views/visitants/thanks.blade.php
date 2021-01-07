<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $message }}</title>
    <link rel="stylesheet" href="{{ url('/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/myStyle.css') }}">
</head>
<body>
    <section class="hero">
        <div class="hero-body centered">
            <div class="container">
                <h1 class="title has-text-centered has-text-black">
                    {{ $message }}
                </h1>
            </div>
        </div>
    </section>
</body>
</html>