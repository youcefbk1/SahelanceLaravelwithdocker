<?php

namespace App\Models;

use App\Traits\Searchable;
use App\Constants\ManageStatus;
use App\Traits\UniversalStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdrawal extends Model
{
    use UniversalStatus, Searchable;

    protected $casts = [
        'withdraw_information' => 'object',
    ];

    protected $hidden = [
        'withdraw_information',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function method(): BelongsTo
    {
        return $this->belongsTo(WithdrawMethod::class, 'method_id');
    }

    // Scope
    public function scopePending($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_PENDING);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_CANCEL);
    }

    public function scopeDone($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_SUCCESS);
    }

    public function scopeIndex($query)
    {
        return $query->where('status', '!=', ManageStatus::PAYMENT_INITIATE);
    }

    public function scopeInitiate($query)
    {
        return $query->where('status', ManageStatus::PAYMENT_INITIATE);
    }

    /**
     * Get the status type.
     */
    protected function statusBadge(): Attribute
    {
        return Attribute::make(
            get: function () {
                return match ($this->status) {
                    ManageStatus::PAYMENT_PENDING => '<span class="badge badge--warning">' . trans('Pending') . '</span>',
                    ManageStatus::PAYMENT_SUCCESS => '<span class="badge badge--success">' . trans('Done') . '</span>',
                    ManageStatus::PAYMENT_CANCEL  => '<span class="badge badge--danger">' . trans('Cancelled') . '</span>',
                    default                       => '<span class="badge badge--secondary">' . trans('Initiated') . '</span>',
                };
            },
        );
    }
}
