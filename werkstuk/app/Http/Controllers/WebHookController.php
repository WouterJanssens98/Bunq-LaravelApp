<?php

namespace App\Http\Controllers;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebHookController extends Controller
{
    public function handle(Request $request) {
        if (! $request->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($request->id);

        if ($payment->isPaid()) {
          Log::info('Betaling is gelukt!' . json_encode($payment));
        } else {
          Log::warning('Betaling is mislukt!' . json_encode($payment));
        }
    }
}
