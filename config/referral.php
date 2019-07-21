<?php

return [
    // * Direct Bonus Amount
    'amount' => 100,

    // * relation model
    'belongs_to' => App\User::class,
    'belongs_to_column' => 'user_id',

    //  * Where to increament balance
    'add_balance_to' => Jxclsv\Referable\Models\DirectReferralWallet::class,

    'models' => [
        'wallet' => Jxclsv\Referable\Models\DirectReferralWallet::class,
        'bonuses' => Jxclsv\Referable\Models\DirectReferralBonus::class,
    ],

    'table_names' => [
        'wallets' => 'direct_referral_wallets',
        'bonuses' => 'direct_referral_bonuses',
    ],

    'wallets' => [
        // * default wallet migration will be loaded
        'migrate' => true,
        'incremental_column' => 'balance',

        // * default wallet has soft deletes
        'soft_deletes' => true,

        'belongs_to_model' => null,
        'belongs_to_table' => 'users',
        'belongs_to_references' => 'id',
        'belongs_to_column' => 'user_id',
    ],

    'bonuses' => [
        // * choose if default wallet migration will be loaded
        'soft_deletes' => false,
        'belongs_to_model' => null,

        'belongs_to_table' => 'users',
        'belongs_to_references' => 'id',
        'belongs_to_column' => 'user_id',

        'relatable_type' => App\User::class
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    'route_names' => [
        'bonuses' => [
            'index' => 'referral.bonuses.index'
        ]
    ]
];
