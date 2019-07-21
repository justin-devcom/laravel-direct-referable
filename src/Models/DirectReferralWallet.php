<?php

namespace Jxclsv\Referable\Models;

use Illuminate\Database\Eloquent\Model;

class DirectReferralWallet extends Model
{
    public function user()
    {
        $config = config('referral.wallets');

        $relation = $config['belongs_to_model'] ?? config('referral.belongs_to');

        $column = $config['belongs_to_column'] ?? config('referral.belongs_to_column');

        return $this->belongsTo($relation, $column);
    }
}
