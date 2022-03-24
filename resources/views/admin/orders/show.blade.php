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
            Nome: {{$order->lastname}}
           </li>
           <li>
            Nome: {{$order->address}}
           </li>
           <li>
            Nome: {{$order->phone}}
           </li>
           <li>
            Nome: {{$order->email}}
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

   </section>





@endsection