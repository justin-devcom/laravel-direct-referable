<?php

namespace Jxclsv\Referable\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DirectReferralBonus extends Model
{
    protected $fillable = [
        'amount'
    ];


    public function referable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        $config = config('referral.bonuses');

        $relation = $config['belongs_to_model'] ?? config('referral.belongs_to');

        $column = $config['belongs_to_column'] ?? config('referral.belongs_to_column');

        return $this->belongsTo($relation, $column);
    }
}
