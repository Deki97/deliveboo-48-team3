@extends('layouts.dashboard');

@section('content')
    <div class="create_restaurant">
        <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            {{-- insert name --}}
            <div class="mb-3">
              <label for="restaurant_name" class="form-label">Nome ristorante</label>
              <input type="text" class="form-control" id="restaurant_name" name="restaurant_name">
            </div>

            {{-- insert address --}}
            <div class="mb-3">
                <label for="address" class="form-label">indirizzo</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            {{-- insert vat --}}
            <div class="mb-3">
                <label for="vat" class="form-label">P.Iva</label>
                <input type="number" class="form-control" id="vat" name="vat">
            </div>

            {{-- insert phone --}}
            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>

            {{-- insert img --}}
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <div>
                    <input type="file" id="image" name="image">
                </div>
                
            </div>

            <button type="submit" class="btn btn-primary">Crea ristorante</button>
          </form>
    </div>
@endsection