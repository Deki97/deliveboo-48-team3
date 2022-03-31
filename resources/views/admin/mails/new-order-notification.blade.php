<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div>
            <h2>Deliveboo</h2>
        </div>
        
    <div class="card">
        <div class="card-header">
            <h4>Conferma ordine</h4>
        </div>
        <div class="card-text">
            <p>Ordine avvenuto con successo: </p>
            <p> il numero ordine: {{ $order->id}}</p>
            <p> Cliente:   {{$order->name}}  {{$order->lastname}} </p>
            <p> email:  {{$order->email}}</p>
            <p> Totale ordine : {{$order->amount}} €</p>
        </div>
    </div>
    </div>
</body>
</html>