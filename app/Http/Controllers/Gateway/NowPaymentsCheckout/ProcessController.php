<?php

namespace App\Http\Controllers\Gateway\NowPaymentsCheckout;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Lib\CurlRequest;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    public static function process(Deposit $deposit)
    {
        $nowPaymentsAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $response       = CurlRequest::curlPostContent('https://api.nowpayments.io/v1/invoice', json_encode([
            'price_amount'     => $deposit->final_amount,
            'price_currency'   => bs('site_cur'),
            'ipn_callback_url' => route('ipn.NowPaymentsCheckout'),
            'success_url'      => route(gatewayRedirectUrl(true)),
            'cancel_url'       => route(gatewayRedirectUrl(false)),
            'order_id'         => $deposit->trx,
        ]), [
            "x-api-key: $nowPaymentsAcc->api_key",
            'Content-Type: application/json',
        ]);

        $response = json_decode($response);

        if (!$response) {
            $send['error']   = true;
            $send['message'] = 'Some problem occurred with api.';

            return $send;
        }

        if (!$response->invoice_url) {
            $send['error']   = true;
            $send['message'] = 'Invalid api key';

            return json_encode($send);
        }

        $send['redirect']     = true;
        $send['redirect_url'] = $response->invoice_url;

        return json_encode($send);
    }

    public function ipn()
    {
        if (!empty($_SERVER['HTTP_X_NOWPAYMENTS_SIG'])) {
            $received_hmac = $_SERVER['HTTP_X_NOWPAYMENTS_SIG'];
            $request_json  = file_get_contents('php://input');
            $request_data  = json_decode($request_json, true);

            ksort($request_data);

            $sorted_request_json = json_encode($request_data, JSON_UNESCAPED_SLASHES);

            if (!empty($request_json)) {
                $gateway    = Gateway::where('alias', 'NowPaymentsCheckout')->first();
                $gatewayAcc = json_decode($gateway->gateway_parameters);
                $hmac       = hash_hmac("sha512", $sorted_request_json, trim($gatewayAcc->secret_key->value));

                if ($hmac == $received_hmac) {
                    if ($request_data['payment_status'] == 'confirmed' || $request_data['payment_status'] == 'finished') {
                        if ($request_data['actually_paid'] == $request_data['pay_amount']) {
                            $deposit = Deposit::where('status', ManageStatus::PAYMENT_INITIATE)
                                ->where('trx', $request_data['order_id'])
                                ->first();

                            if ($deposit) PaymentController::dataUpdate($deposit);
                        }
                    }
                }
            }
        }
    }
}
