<?php

namespace Jxclsv\Referable\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jxclsv\Referable\Models\DirectReferralBonus;
use App\User;

class DirectReferralBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $bonuses = $user->directReferralBonuses;

        return view('referral::bonuses.index', compact('bonuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
