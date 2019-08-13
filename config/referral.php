<?php

return [
    // * Direct Bonus Amount
    'amount' => 100,

    'paginate_count' => 5,

    // * relation model
    'belongs_to' => Jxclsv\Referable\Models\User::class,
    'belongs_to_column' => 'user_id',


    //  * Where to increament balance
    'add_balance_to' => Jxclsv\Referable\Models\DirectReferralWallet::class,

    // Direct Referral Models
    'models' => [
        'wallet' => Jxclsv\Referable\Models\DirectReferralWallet::class,
        'bonuses' => Jxclsv\Referable\Models\DirectReferralBonus::class,
    ],

    // * Custom table name
    'table_names' => [
        // ! directable table
        'directable' => [
            'table_name' => 'users',
            'column_name' => 'sponsor_id',
            'indexed' => true
        ],

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

        'relatable_type' => Jxclsv\Referable\Models\User::class
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
