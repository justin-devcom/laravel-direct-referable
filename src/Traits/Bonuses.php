<?php

namespace Jxclsv\Referable\Traits;

use Jxclsv\Referable\Contracts\DirectReferable;

trait Bonuses
{
    public function directReferralBonuses()
    {
        return $this->hasMany(
            config('referral.models.bonuses'),
            config('referral.bonuses.belongs_to_column')
        );
    }

    public function createDirectReferralBonus(DirectReferable $referable)
    {
        return tap($this->directReferralBonuses()->make([
            'amount' => config('referral.amount'),
            'model_type' => config('referral.bonuses.relatable_types'),
        ])->referable()->associate($referable))->save();
    }
}
