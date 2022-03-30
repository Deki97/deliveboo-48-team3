<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $order = new Order();
        $order->name = $data['name'];
        $order->lastname = $data['lastname'];
        $order->address = $data['address'];
        $order->email = $data['email'];
        $order->amount = $data['amount'];
        $order->status = 0;
        $order->save();

        foreach ($data['order_details'] as $key => $detail) {
            $order->dishes()->attach($key, ['quantity' => $detail]);
        }

        return response()->json([
            'Message' => 'Order was successfully created',
            'Order_number' => $order->id
        ], 200);
    }

    
}