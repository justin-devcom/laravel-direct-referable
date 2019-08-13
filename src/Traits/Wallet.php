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
}
