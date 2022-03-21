@extends('layouts.dashboard')

@section('content')
    <div class="detail text-center my-2">
        <div class="img_detail">
            <img src="{{$restaurant->path_img}}" alt="{{$restaurant->restaurant_name}}">
        </div>
        <div class="description my-3">
            <h2>Nome: {{$restaurant->restaurant_name}}</h2>
            <h5>{{$restaurant->slug}}</h5>
            <h3>Indirizzo: {{$restaurant->address}}</h3>
            <h3>Telefono: {{$restaurant->phone}}</h3>
            <h4>P.Iva: {{$restaurant->vat}}</h4>
        </div>
    </div>
@endsection