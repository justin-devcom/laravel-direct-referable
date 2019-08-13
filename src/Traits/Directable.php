<?php

namespace Jxclsv\Referable\Traits;

use Illuminate\Support\Facades\DB;
use Jxclsv\Referable\Contracts\DirectReferable;

trait Directable
{
    public function directs()
    {
        return $this->hasMany(config('referral.belongs_to'), config('referral.table_names.directable.column_name'));
    }

    public function sponsor()
    {
        return $this->belongsTo(config('referral.belongs_to'), config('referral.table_names.directable.column_name'));
    }

    public function addDirects(DirectReferable $referable)
    {
        return DB::transaction(function () use ($referable) {
            $bonus = $this->createDirectReferralBonus($referable);

            config('referral.add_balance_to')::where(config('referral.belongs_to_column'), $this->getKey())
                ->increment(
                    config('referral.wallets.incremental_column'),
                    config('referral.amount')
                );

            return $bonus;
        });
    }
}
