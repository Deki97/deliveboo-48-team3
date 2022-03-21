@extends('layouts.dashboard')

@section('content')
   <div class="container">
       <h1 class="text-center">LISTA RISTORANTI</h1>
      <div class="restaurant_cards">
          @foreach ($restaurants as $restaurant)
               {{-- single restaurant-card --}}
        <div class="card" style="width: 18rem;">
            <img src="{{$restaurant->path_img}}" class="card-img-top" alt="{{$restaurant->restaurant_name}}">
            <div class="card-body">
            <h5 class="card-title"><strong>Nome:</strong>{{$restaurant->restaurant_name}}</h5>
            <p class="card-text"><strong>Indirizzo:</strong>{{$restaurant->address}}</p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Tel:</strong>{{$restaurant->phone}}</li>
            </ul>
            <div class="card-body">
            <a href="#" class="card-link">Dettagli</a>
            </div>
        </div>
        {{-- end restaurant card --}}
        @endforeach
      </div>
   </div>
@endsection