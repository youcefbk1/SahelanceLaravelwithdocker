<?php

namespace App\Notify;

use App\Notify\NotifyProcess;
use App\Notify\SmsGateway;
use App\Notify\Notifiable;
use Exception;

class Sms extends NotifyProcess implements Notifiable
{
    /**
     * Mobile number of receiver
     *
     * @var string
     */
    public string $mobile;

    /**
     * Assign value to properties
     *
     * @return void
     */
    public function __construct()
    {
        $this->statusField    = 'sms_status';
        $this->body           = 'sms_body';
        $this->globalTemplate = 'sms_body';
        $this->notifyConfig   = 'sms_config';
    }

    /**
     * Send notification
     *
     * @return void
     */
    public function send(): void
    {
        //get message from parent
        $message = $this->getMessage();

        if ($this->setting->sa && $message) {
            try {
                $gateway = $this->setting->sms_config->name;

                if ($this->mobile) {
                    $sendSms          = new SmsGateway();
                    $sendSms->to      = $this->mobile;
                    $sendSms->from    = $this->setting->sms_from;
                    $sendSms->message = strip_tags($message);
                    $sendSms->config  = $this->setting->sms_config;
                    $sendSms->$gateway();
                }
            } catch (Exception $e) {
                $this->createErrorLog('SMS Error: ' . $e->getMessage());

                session()->flash('sms_error', 'API Error: ' . $e->getMessage());
            }
        }
    }

    /**
     * Configure some properties
     *
     * @return void
     */
    public function prevConfiguration(): void
    {
        //Check If User
        if ($this->user) {
            $this->mobile       = $this->user->mobile;
            $this->receiverName = $this->user->fullname;
        }

        $this->toAddress = $this->mobile;
    }
}
