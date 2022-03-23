<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index(){



        
        $userId = Auth::id();
        $restaurants = Restaurant::where('user_id', $userId)->get();
        
        $orders = Order::All();

        foreach ($restaurants as $restaurant) {
            $orders[$restaurant->restaurant_name] = $restaurant->orders;
        }


        return view('admin.orders.index', compact('orders'));





    }

    public function show(){




    }
}
