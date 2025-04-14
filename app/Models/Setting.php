<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = [
        'mail_config'          => 'object',
        'sms_config'           => 'object',
        'universal_shortcodes' => 'object',
    ];

    protected $hidden = [
        'email_template',
        'mail_config',
        'sms_config',
        'system_info',
    ];

    public function scopeSiteName($query, $pageTitle): string
    {
        $pageTitle = empty($pageTitle) ? '' : ' | ' . $pageTitle;

        return $this->site_name . $pageTitle;
    }

    protected static function boot(): void
    {
        parent::boot();

        static::saved(function () {
            cache()->forget('setting');
        });
    }
}
