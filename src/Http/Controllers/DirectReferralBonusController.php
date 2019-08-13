<?php

namespace Jxclsv\Referable\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Jxclsv\Referable\Models\DirectReferralBonus;

class DirectReferralBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $bonuses = $user->directReferralBonuses()->paginate(
            config('referral.paginate_count')
        );

        return view('referral::bonuses.index', compact('bonuses'));
    }
}
