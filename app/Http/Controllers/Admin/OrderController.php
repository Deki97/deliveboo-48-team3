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
            $dishArray->push(['id' =>$dish->id, 'price' =>$dish->price]);
        };
        
        $dishOrders = DishOrder::All();
        $orders = Order::all();
        $dishOrderArray = collect([]);
        foreach($dishArray as $singleDish) {
            foreach ($dishOrders as $dishOrder) {
                if($singleDish['id'] == $dishOrder->dish_id) {
                    $dishOrderArray->push([Order::where('id', $dishOrder->order_id)->get()]);
                }
            } 
        }


        $dishprices = collect([]);
        foreach($dishArray as $dish) {
            foreach($dishOrders as $dishOrder){
                if($dish['id'] == $dishOrder->dish_id) {
                    $dishprices->push([$dish['price'],$dishOrder->quantity]);
                    foreach($dishprices as $dishprice) {
                        $dishprice = (float)$dishprice[0];
                        
                        $sum[] = $dishprice * $dishOrder->quantity;

                        // for($i = 0; $i <= $sum.length; $i++) {
                        //     $total_price = $sum += $sum;
                        // }
                    }
                }
            }
        }
        return view('admin.orders.index', compact('dishOrderArray'));
    }

    public function show($id){

        $order = Order::findOrFail($id);
        $order->status = Order::checkStatus($order->status);
        return view('admin.orders.show',compact('order'));
    }
    
}
