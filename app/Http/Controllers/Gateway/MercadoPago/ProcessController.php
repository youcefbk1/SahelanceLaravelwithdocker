<?php

namespace App\Http\Controllers\Gateway\MercadoPago;

use App\Models\Deposit;
use App\Models\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    public static function process(Deposit $deposit)
    {
        $gatewayCurrency = $deposit->gatewayCurrency();
        $alias           = $deposit->gateway->alias;
        $gatewayAcc      = json_decode($gatewayCurrency->gateway_parameter);
        $curl            = curl_init();
        $userFullName    = $deposit->user->fullname;
        $userEmail       = $deposit->user->email;
        $preferenceData  = [
            'items'            => [
                [
                    'id'          => $deposit->trx,
                    'title'       => "Deposit Money",
                    'description' => "Deposit money from $userFullName",
                    'quantity'    => 1,
                    'currency'    => $gatewayCurrency->currency,
                    'unit_price'  => floatval($deposit->final_amount),
                ]
            ],
            'payer'            => [
                'email' => $userEmail,
            ],
            'back_urls'        => [
                'success' => route(gatewayRedirectUrl(true)),
                'pending' => '',
                'failure' => route(gatewayRedirectUrl(false)),
            ],
            'notification_url' => route('ipn.' . $alias),
            'auto_return'      => 'approved',
        ];

        $httpHeader = ["Content-Type: application/json"];
        $url        = "https://api.mercadopago.com/checkout/preferences?access_token=$gatewayAcc->access_token";
        $opts       = [
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => json_encode($preferenceData, true),
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTPHEADER     => $httpHeader,
        ];

        curl_setopt_array($curl, $opts);
        $response = curl_exec($curl);
        $result   = json_decode($response, true);
        curl_error($curl);
        curl_close($curl);

        if (@$result['init_point']) {
            $send['redirect']     = true;
            $send['redirect_url'] = $result['init_point'];
        } else {
            $send['error']   = true;
            $send['message'] = 'Some problem occurred with api.';
        }

        $send['view'] = '';

        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $paymentId   = json_decode(json_encode($request->all()))->data->id;
        $gateway     = Gateway::where('alias', 'MercadoPago')->first();
        $param       = json_decode($gateway->gateway_parameters);
        $accessToken = $param->access_token->value;

        $paymentUrl = "https://api.mercadopago.com/v1/payments/$paymentId?access_token=$accessToken";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paymentUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $paymentData = curl_exec($ch);
        curl_close($ch);

        $payment = json_decode($paymentData, true);
        $trx     = $payment['additional_info']['items'][0]['id'];
        $deposit = Deposit::where('trx', $trx)->initiate()->first();

        if ($payment['status'] == 'approved' && $deposit) {
            PaymentController::dataUpdate($deposit);
            $toast[] = ['success', 'Payment completed successfully'];

            return to_route(gatewayRedirectUrl(true))->with('toasts', $toast);
        }

        $toast[] = ['error', 'Unable to process'];

        return to_route(gatewayRedirectUrl(false))->with('toasts', $toast);
    }
}
