<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'path_img',
        'price',
        'visible',
        'slug',
        'restaurant_id'
    ];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
    public function order() {
        return $this->belongsToMany('App\Order');
    }

    protected function getUniqueSlugFromName($name) {
        //creo lo slug dal $title
        $slug = Str::slug($name);
        //creo un'altra variabile per evitare che i numeri si concatenino (slug-1-2-3)
        $slug_base = $slug;

        // Controlliamo se esiste già un post con questo slug.
        $dish_found = Dish::where('slug', '=', $slug)->first();
        $counter = 1;
        while($dish_found) {
            // Se esiste, aggiungiamo -1 allo slug
            // ricontrollo che non esista lo slug con -1, se esiste provo con -2
            $slug = $slug_base . '-' . $counter;
            $dish_found = Dish::where('slug', '=', $slug)->first();
            $counter++;
        }
        return $slug;
    }
}
