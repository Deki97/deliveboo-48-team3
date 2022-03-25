<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dish() {
        return $this->belongsToMany('App\Dish');
    }
    public function DishOrder(){
        return $this->hasMany('App\DishOrder');
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
    
    public static function checkStatus($status){
        if($status === 0){
            return ('Non Pagato');
        }else{
            return ('Pagato');
        }
    }

}
