<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
class ShopController extends Controller
{

    public function getSuccess() {


        dd('Betaling wordt verwerkt!');

    }


    public function preparePayment(Request $r)
    {
        $payment = Mollie::api()->payments()->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $r->amount. '.00' // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => $r->description,
            "webhookUrl" => 'https://a8cd985f8dbe.ngrok.io/webhooks/mollie',
            "redirectUrl" => route('paymentSuccess'),
            "metadata" => [
                "order_id" => "12345",
                "name" => $r->name
            ],
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }
}
