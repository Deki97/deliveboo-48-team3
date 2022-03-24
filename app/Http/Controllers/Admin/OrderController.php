<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Restaurant;
use App\Dish;
use App\DishOrder;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index(){



        
        $userId = Auth::id();
        $restaurants = Restaurant::where('user_id', $userId)->get();

        $restaurantId = $restaurants[0]->id;
        
        $dishes = Dish::where('restaurant_id', $restaurantId)->get();

        $dishArray = collect([]);
        foreach ($dishes as $dish) {
            $dishArray->push(['id' =>$dish->id]);

            
        };
         
       /*  for ($i=0; $i <$dishArray.length ; $i++) { 
            if($di)
        } */

        /* foreach ($dishArray as $singleDish) {
            $dishorders = DishOrder::where('dish_id', $dishArray )->get();

        } */
    
        $orders = Order::All();
        
       

        
        return view('admin.orders.index', compact('orders'));





    }

    public function show($id){

        $order = Order::findOrFail($id);
        $order->status = Order::checkStatus($order->status);
     

        return view('admin.orders.show',compact('order'));



        
    }
    
}
