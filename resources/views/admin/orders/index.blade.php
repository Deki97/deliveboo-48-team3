@extends('layouts.dashboard')


@section('content')
<h1>Ordini</h1>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Indirizzo</th>
        <th scope="col">Prezzo Totale</th>
        <th scope="col">Status</th>

        <th scope="col"></th>


      </tr>
    </thead>
    <tbody>
      {{-- {{dd($orders)}} --}}
        @foreach ($orders as $order)
      
      <tr>

        <th scope="row">{{ $order->id }}</th>
        <td>{{$order->name}}</td>
        <td>{{$order->lastname}}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->tot_price }}€</td>
        <td>{{ $order->status }}</td>
        <td><a href="#">Dettagli</a></td>


      </tr>
      @endforeach
    </tbody>
  </table>

@endsection