@extends('layouts.dashboard')

@section('content')
   <div class="container">
       <h1 class="text-center">LISTA RISTORANTI</h1>
       {{-- Se il ristorante è presente mostro la card --}}
        <div class="row">
            <div class="col">
                 @if (!$restaurants->isEmpty())
                    <div class="restaurant_cards">
                        @foreach ($restaurants as $restaurant)
                        {{-- single restaurant-card --}}
                            <div class="card text-center " style="width: 22rem;">
                                @if (str_contains($restaurant->path_img,'http'))
                                    <img src="{{$restaurant->path_img}}" class="card-img-top" alt="{{$restaurant->restaurant_name}}">
                                @else
                                    <img src="{{asset('storage/' . $restaurant->path_img)}}" class="card-img-top" alt="{{$restaurant->restaurant_name}}">
                                @endif
                                <div class="card-body ">
                                    <h5 class=" card-title"><strong>Nome:</strong>{{$restaurant->restaurant_name}}</h5>
                                    <p class="card-text"><strong>Indirizzo:</strong>{{$restaurant->address}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Tel:</strong>{{$restaurant->phone}}</li>
                                </ul>
                                <div class="card-body">
                                    <a href="{{route('admin.restaurants.show',['restaurant'=>$restaurant->id ])}}" class="card-link">Dettagli</a>
                                </div>
                            </div>
                            {{-- end restaurant card --}}
                        @endforeach
                    </div>
                @else
                    {{-- altrimenti mostriamo un bottone per aggiungere un ristorante --}}
                    <a class="btn btn-primary text-center" href="{{route('admin.restaurants.create')}}">Aggiungi</a>
                @endif  
            </div>
        </div>      
   </div>

@endsection