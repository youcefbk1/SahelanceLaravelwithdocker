<?php

namespace App\Lib;

use App\Models\Plugin;

class Captcha
{
    /*
    |--------------------------------------------------------------------------
    | Captcha
    |--------------------------------------------------------------------------
    |
    | This class is using verify and show captcha. Here is currently available
    | custom captcha and google recaptcha2. Developer can use verify method
    | to verify all captcha or can use separately if required
    |
    */

    /**
     * Google recaptcha2 script
     *
     * @return ?string
     */
    public static function reCaptcha(): ?string
    {
        $reCaptcha = Plugin::where('act', 'google-recaptcha2')->active()->first();

        return $reCaptcha ? $reCaptcha->generateScript() : null;
    }

    /**
     * Verify all captcha
     *
     * @return boolean
     */
    public static function verify(): bool
    {
        $gCaptchaPass = self::verifyGoogleCaptcha();

        return (bool)$gCaptchaPass;
    }

    /**
     * Verify google recaptcha2
     *
     * @return boolean
     */
    public static function verifyGoogleCaptcha(): bool
    {
        $pass          = true;
        $googleCaptcha = Plugin::where('act', 'google-recaptcha2')->active()->first();

        if ($googleCaptcha) {
            $resp = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $googleCaptcha->shortcode->secret_key->value . "&response=" . request()['g-recaptcha-response'] . "&remoteip=" . getRealIP()), true);

            if (!$resp['success']) $pass = false;
        }

        return $pass;
    }
}
