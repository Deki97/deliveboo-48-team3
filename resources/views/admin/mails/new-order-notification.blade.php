<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Ordine eseguito con successo!
    </h1>
    <h2>
        Riepilogo ordine
    </h2>
    <ul>
        <li>{{$order->name}}</li>
        <li>{{$dish->name}}</li>
    </ul>
</body>
</html>