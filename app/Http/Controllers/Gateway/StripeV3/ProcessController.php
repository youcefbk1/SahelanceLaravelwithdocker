<?php

namespace App\Http\Controllers\Gateway\StripeV3;

use Exception;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Deposit;
use Stripe\Checkout\Session;
use UnexpectedValueException;
use App\Constants\ManageStatus;
use App\Models\GatewayCurrency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;
use Stripe\Exception\SignatureVerificationException;

class ProcessController extends Controller
{
    public static function process(Deposit $deposit)
    {
        $stripeAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $alias     = $deposit->gateway->alias;

        Stripe::setApiKey("$stripeAcc->secret_key");

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
					'price_data'=>[
						'unit_amount' => round($deposit->final_amount, 2) * 100,
						'currency' => "$deposit->method_currency",
						'product_data'=>[
							'name' => bs('site_name'),
							'description' => 'Donation with Stripe',
							'images' => [asset('assets/universal/images/logoFavicon/logo_dark.png')],
						]
					],
					'quantity' => 1,
				]],
                'cancel_url'           => route(gatewayRedirectUrl(false)),
                'success_url'          => route(gatewayRedirectUrl(true)),
            ]);
        } catch (Exception $e) {
            $send['error']   = true;
            $send['message'] = $e->getMessage();

            return json_encode($send);
        }

        $send['view']        = 'user.payment.' . $alias;
        $send['session']     = $session;
        $send['stripeJSAcc'] = $stripeAcc;
        $deposit->btc_wallet = json_decode(json_encode($session))->id;
        $deposit->save();

        return json_encode($send);
    }

    public function ipn()
    {
        $stripeAcc         = GatewayCurrency::where('gateway_alias', 'StripeV3')->first();
        $gateway_parameter = json_decode($stripeAcc->gateway_parameter);

        Stripe::setApiKey($gateway_parameter->secret_key);

        // You can find your endpoint's secret in your webhook settings
        $endpoint_secret = $gateway_parameter->end_point; // main
        $payload         = @file_get_contents('php://input');
        $sig_header      = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event           = null;

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $deposit = Deposit::where('btc_wallet', $session->id)->first();

            if ($deposit->status == ManageStatus::PAYMENT_INITIATE) PaymentController::dataUpdate($deposit);
        }

        http_response_code(200);
    }
}
