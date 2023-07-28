<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    Buongiorno sign. Amministratore, <br>
    notifica creazione nuovo coniglio: {{ $rabbit -> name }} <br>
    <br>
    Peso indicato: {{ $rabbit -> weight }}g <br>
    Contadino: {{ $rabbit -> farmer -> name }} {{ $rabbit -> farmer -> lastname }} <br>
    @if ($rabbit -> main_picture)
        <br>
        <img src="{{ $message->embed('storage/' . $rabbit -> main_picture) }}">
    @endif
    <br>
    <a href="{{ route('rabbit.show', $rabbit -> id) }}">
        Check this out
    </a>
</body>
</html>
