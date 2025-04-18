<?php

namespace App\Http\Controllers\Gateway\PerfectMoney;

use App\Models\Deposit;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class ProcessController extends Controller
{
    public static function process(Deposit $deposit)
    {
        $perfectAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);

        $val['PAYEE_ACCOUNT']        = trim($perfectAcc->wallet_id);
        $val['PAYEE_NAME']           = bs('site_name');
        $val['PAYMENT_ID']           = "$deposit->trx";
        $val['PAYMENT_AMOUNT']       = round($deposit->final_amount, 2);
        $val['PAYMENT_UNITS']        = "$deposit->method_currency";
        $val['STATUS_URL']           = route('ipn.' . $deposit->gateway->alias);
        $val['PAYMENT_URL']          = route(gatewayRedirectUrl(true));
        $val['PAYMENT_URL_METHOD']   = 'POST';
        $val['NOPAYMENT_URL']        = route(gatewayRedirectUrl(false));
        $val['NOPAYMENT_URL_METHOD'] = 'POST';
        $val['SUGGESTED_MEMO']       = $deposit->user->email;
        $val['BAGGAGE_FIELDS']       = 'IDENT';

        $send['val']    = $val;
        $send['view']   = 'user.payment.redirect';
        $send['method'] = 'post';
        $send['url']    = 'https://perfectmoney.is/api/step1.asp';

        return json_encode($send);
    }

    public function ipn()
    {
        $deposit    = Deposit::where('trx', $_POST['PAYMENT_ID'])->first();
        $pmAcc      = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $passphrase = strtoupper(md5($pmAcc->passphrase));

        define('ALTERNATE_PHRASE_HASH', $passphrase);
        define('PATH_TO_LOG', '/somewhere/out/of/document_root/');

        $string =
            $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' .
            $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' .
            $_POST['PAYMENT_BATCH_NUM'] . ':' . $_POST['PAYER_ACCOUNT'] . ':' .
            ALTERNATE_PHRASE_HASH . ':' . $_POST['TIMESTAMPGMT'];

        $hash  = strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];

        if ($hash == $hash2) {
            foreach ($_POST as $key => $value) $details[$key] = $value;

            $deposit->details = $details;
            $deposit->save();

            $amount = $_POST['PAYMENT_AMOUNT'];
            $unit   = $_POST['PAYMENT_UNITS'];

            if (
                $_POST['PAYEE_ACCOUNT'] == $pmAcc->wallet_id &&
                $unit == $deposit->method_currency &&
                $amount == round($deposit->final_amount, 2) &&
                $deposit->status == ManageStatus::PAYMENT_INITIATE
            ) {
                PaymentController::dataUpdate($deposit);
            }
        }
    }
}
