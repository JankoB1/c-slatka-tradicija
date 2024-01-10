<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Recepti')</title>
</head>
<body>

    <ul>
        <li><a href="#"> O nama </a></li>
        <li><a href="#"> Proizvodi </a></li>
        <li><a href="{{ route('recipes.retrieve') }}"> Recepti </a></li>
        <li><a href="#"> Predstavljamo </a></li>
        <li><a href="#"> Kontakt </a></li>
        <li><a href="{{ route('recipes.create') }}"> Kreiraj recept </a></li>
    </ul>

    <main>
        @yield('content')
    </main>
</body>
</html>
