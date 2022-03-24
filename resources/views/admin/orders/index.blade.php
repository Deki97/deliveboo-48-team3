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
        @foreach ($dishOrderArray as $dishOrder)
          @foreach ($dishOrder as $dish)
            @foreach ($dish as $singleDish)
              <tr>
                <td>{{$singleDish->name}}</td>
                <td>{{$singleDish->lastname}}</td>
                <td>{{ $singleDish->address }}</td>
                <td>{{ $singleDish->tot_price }}€</td>
                <td><a href="{{route('admin.details', ['id' => $singleDish->id])}}">Dettagli</a></td>
              </tr>
            @endforeach
        @endforeach
      @endforeach
    </tbody>
  </table>

@endsection