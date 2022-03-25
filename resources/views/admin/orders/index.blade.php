@extends('layouts.dashboard')


@section('content')
<h1>Ordini</h1>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Prezzo Totale</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key=>$order)
          <tr>
            <td>{{$order['name']}}</td>
            <td>{{$order['lastname']}}</td>
            <td>{{$order['address']}}</td>
            <td>{{str_replace(".",",",number_format($order['tot_price'], 2))}}€</td>
            <td><a href="{{route('admin.details', ['id' => $order->id])}}">Dettagli</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection