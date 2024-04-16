<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripeCheckout(Request $request)
    {
        $stripe =  new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $rediectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';
        $response = $stripe->checkout->sessions->create([
            'success_url' => $rediectUrl,
            'customer_email' => 'demo@gmail.com',
            'payment_method_types' => ['link', 'card'],
            'line_items' =>[
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $request->product,
                        ],
                        'unit_amount' => 100 * $request->price,
                        'currency' => 'USD',
                    ],

                    'quantity' => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);
        return redirect($response['url']);
    }
    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        if (!empty($response->display_items) && count($response->display_items) > 0) {
            $description = $response->display_items[0]->custom ?? '';
        } else {
            $description = 'No description available';
        }

        $payment = new Payment();
        $payment->amount = $response->amount_total / 100;
        $payment->currency = $response->currency;
        $payment->transaction_id = $response->payment_intent;
        $payment->description = $description;

        $payment->save();

        return redirect('/')->with('success', 'Payment Successful.');
    }
}
