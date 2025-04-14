<?php

namespace App\Http\Controllers\Gateway\Payeer;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    public static function process(Deposit $deposit)
    {
        $payeerAcc        = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $setting          = bs();
        $val['m_shop']    = trim($payeerAcc->merchant_id);
        $val['m_orderid'] = $deposit->trx;
        $val['m_amount']  = number_format($deposit->final_amount, 2, '.', '');
        $val['m_curr']    = $deposit->method_currency;
        $val['m_desc']    = base64_encode("Pay To $setting->site_name");
        $arHash           = [$val['m_shop'], $val['m_orderid'], $val['m_amount'], $val['m_curr'], $val['m_desc']];
        $arHash[]         = $payeerAcc->secret_key;
        $val['m_sign']    = strtoupper(hash('sha256', implode(":", $arHash)));
        $send['val']      = $val;
        $send['view']     = 'user.payment.redirect';
        $send['method']   = 'get';
        $send['url']      = 'https://payeer.com/merchant';

        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $deposit = Deposit::where('trx', $request->m_orderid)->first();

        if (isset($request->m_operation_id) && isset($request->m_sign)) {
            $payeerAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);
            $sign_hash = strtoupper(hash('sha256', implode(":", array(
                $request->m_operation_id,
                $request->m_operation_ps,
                $request->m_operation_date,
                $request->m_operation_pay_date,
                $request->m_shop,
                $request->m_orderid,
                $request->m_amount,
                $request->m_curr,
                $request->m_desc,
                $request->m_status,
                $payeerAcc->secret_key
            ))));

            if ($request->m_sign != $sign_hash) {
                $toast[] = ['error', 'The digital signature did not matched'];
            } else {
                if (
                    $request->m_amount == getAmount($deposit->final_amount) &&
                    $request->m_curr == $deposit->method_currency &&
                    $request->m_status == 'success' &&
                    $deposit->status == ManageStatus::PAYMENT_INITIATE
                ) {
                    PaymentController::dataUpdate($deposit);
                    $toast[] = ['success', 'Payment completed successfully'];

                    return to_route(gatewayRedirectUrl(true))->with('toasts', $toast);
                } else {
                    $toast[] = ['error', 'Payment failed'];
                }
            }
        } else {
            $toast[] = ['error', 'Payment failed'];
        }

        return to_route(gatewayRedirectUrl(false))->with('toasts', $toast);
    }
}
