<?php

namespace App\Http\Controllers\Api\Payment;

use Braintree\Gateway;
use App\Http\Requests\Payment\PaymentRequest;
use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generate(PaymentRequest $request, Gateway $gateway) {
        $token = $gateway->clientToken()->generate();
        $data = [
            "token" => $token
        ];
        return response()->json($data);
    }
    public function makePayment(PaymentRequest $request, Gateway $gateway) {
        $dish = Dish::find($request->dish);
        $result = $gateway->transaction()->sale([
            'amount' => $dish->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success) {
            $data = [
                "message" => 'Transazione eseguita con successo.'
            ];
            return response()->json($data,200);
        }else {
            $data = [
                "message" => 'Transazione fallita!'
            ];
            return response()->json($data,401);
        }
    }
}
