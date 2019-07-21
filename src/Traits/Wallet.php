<?php

namespace Jxclsv\Referable\Traits;

use Illuminate\Support\Facades\DB;
use Jxclsv\Referable\Contracts\DirectReferable;

trait Wallet
{
    public function directReferralWallet()
    {
        return $this->hasOne(
            config('referral.models.wallet'),
            config('referral.wallets.belongs_to_column')
        );
    }

    public function createDirectReferralWallet()
    {
        $this->directReferralWallet()->create();
    }

    /**
     * addBalance
     *
     * Creates direct referral bonus
     * insert 
     * 
     * @param DirectReferable $referable
     * @return Jxclsv\Referable\Models\DirectReferralBonus
     */
    public function addBalance(DirectReferable $referable)
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
