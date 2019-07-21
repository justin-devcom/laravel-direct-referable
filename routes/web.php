<?php

Route::middleware('web', 'auth')->group(function () {
    Route::get(
        'bonuses/direct-referral/{user}',
        'Jxclsv\Referable\Http\Controllers\DirectReferralBonusController@index'
    )->name(config('referral.route_names.bonuses.index'));
});
