@extends('layouts.dashboard')

@section('content')
    <div class="detail text-center my-2">
        <div class="img_detail">
            @if (str_contains($restaurant->path_img,'http'))
                <img src="{{$restaurant->path_img}}" class="card-img-top" alt="{{$restaurant->restaurant_name}}">
            @else
                <img src="{{asset('storage/' . $restaurant->path_img)}}" class="card-img-top" alt="{{$restaurant->restaurant_name}}">
            @endif
        </div>
        <div class="description my-3">
            <h2>Nome: {{$restaurant->restaurant_name}}</h2>
            <h5>{{$restaurant->slug}}</h5>
            <div>
                <h3 class="d-inline">Categorie:</h3>
                @forelse ($restaurant->category as $category)
                    {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                @empty
                    nessuno
                @endforelse

            </div>
            <h3>Indirizzo: {{$restaurant->address}}</h3>
            <h3>Telefono: {{$restaurant->phone}}</h3>
            <h4>P.Iva: {{$restaurant->vat}}</h4>
        </div>
        <div>
            <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}">Modifica ristorante</a>
        </div>

        <div>
            <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('sei sicuro di voler cancellare?')" class="btn btn-danger">Cancella</button>
            </form>
        </div>
    </div>
@endsection