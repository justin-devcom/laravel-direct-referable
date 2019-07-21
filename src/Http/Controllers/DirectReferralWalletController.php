<?php

namespace Jxclsv\Referable\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param Jxclsv\Referable\Models\DirectReferralWallet  $directReferralWallet
     * @return \Illuminate\Http\Response
     */
    public function show(DirectReferralWallet $directReferralWallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Jxclsv\Referable\Models\DirectReferralWallet  $directReferralWallet
     * @return \Illuminate\Http\Response
     */
    public function edit(DirectReferralWallet $directReferralWallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Jxclsv\Referable\Models\DirectReferralWallet  $directReferralWallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DirectReferralWallet $directReferralWallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Jxclsv\Referable\Models\DirectReferralWallet  $directReferralWallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirectReferralWallet $directReferralWallet)
    {
        //
    }
}
