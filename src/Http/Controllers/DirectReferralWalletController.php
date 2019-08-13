<?php

namespace Jxclsv\Referable\Http\Controllers;

use Illuminate\Http\Request;
use Jxclsv\Referable\Models\DirectReferralWallet;

class DirectReferralWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('referral::index');
    }
}
