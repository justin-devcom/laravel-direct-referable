<?php

namespace Jxclsv\Referable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Jxclsv\Referable\Contracts\DirectReferable;

class DirectReferralWallet extends Model
{
    public function user()
    {
        $config = config('referral.wallets');

        $relation = $config['belongs_to_model'] ?? config('referral.belongs_to');

        $column = $config['belongs_to_column'] ?? config('referral.belongs_to_column');

        return $this->belongsTo($relation, $column);
    }

    public function addBalance($amount = null)
    {
        return tap($this)->increment(
            config('referral.wallets.incremental_column'),
            $amount ?? config('referral.amount')
        );
    }
}
