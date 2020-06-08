<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use App\Donation;
use App\Page;
class ShopController extends Controller
{

    public function getSuccess() {

    $pages = Page::where('active', 1)->get();


    return view('donations.donation_success', [
        'pages' => $pages
            ]);
    }


    public function preparePayment(Request $r)
    {
        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'description' => $r->description,
            'value' => $r->amount,
            'visible' => $r->active

        ];

        Donation::create($data);


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
