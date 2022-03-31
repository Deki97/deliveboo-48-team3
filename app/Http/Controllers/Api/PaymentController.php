<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
// use App\Mail\OrderConfirmationEmail;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Order;
// use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function generate(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        return response()->json([
            'token' => $token,
            'message' => 'Success'
        ], 200);
    }

    public function makepayment(PaymentRequest $request, Gateway $gateway)
    {
        $order = Order::find($request->id);

        $result = $gateway->transaction()->sale([
            'amount' => $order->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $order->status=1;
            $order->save();
            $data = [
                'email' => $order->email,
                'amount' => $order->amount,
                'order_number' => $order->id,
                'success' => true,
                'message' => 'Transazione avvenuta con successo'
            ];

            // Mail::to($order->customer_email,'customer@email.com')->send(new OrderConfirmationEmail($order));
            return response()->json(compact('data'), 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita'
            ];
            return response()->json(compact('data'), 401);
        }
    }
}