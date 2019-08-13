<?php

namespace Jxclsv\Referable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Jxclsv\Referable\Models\DirectReferralBonus;

class DirectReferralBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonuses = auth()->user()->directReferralBonuses()->with('referable')->paginate(
            config('referral.paginate_count')
        );

        return view('referral::bonuses.index', compact('bonuses'));
    }
}
