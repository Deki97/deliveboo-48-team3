<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Order;

use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index(){



        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->get();
        
       
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id){

        $order = Order::findOrFail($id);
        $order->status = Order::checkStatus($order->status);
        return view('admin.orders.show',compact('order'));
    }
    
}
