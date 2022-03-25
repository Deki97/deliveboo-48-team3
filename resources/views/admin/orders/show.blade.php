@extends('layouts.dashboard')

@section('content')
{{-- {{dd( $order->dishorder )}} --}}
    <h2>Riepilogo Ordine</h2>


   <section>
        <h3>Info Utente:</h3>
   
       <ul> 
           <li>
            Nome: {{$order->name}}
           </li>
           <li>
            Cognome: {{$order->lastname}}
           </li>
           <li>
            Indirizzo: {{$order->address}}
           </li>
           <li>
            Telefono: {{$order->phone}}
           </li>
           <li>
            E-mail: {{$order->email}}
           </li>
       </ul>
   </section>
   <section>
       <h3>Info Ordine:</h3>
       @foreach ($order->dishorder as $singleorder)
       <ul class="my-3">
           <li>
               Nome Piatto: {{$singleorder->dish->name}}
           </li>
           <li>
                Quantità: {{$singleorder->quantity}}
            </li>

            <li>
                Prezzo: {{$singleorder->dish->price}}
            </li>
       </ul>
       @endforeach
       <div>
           Status: {{$order->status}}
       </div>
       <div>
            Prezzo totale: {{$order->tot_price}}
       </div>
       <div class="my-5">
           <a href="{{route('admin.order')}}">Torna agli ordini</a>
       </div>

   </section>





@endsection