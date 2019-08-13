<?php

namespace Jxclsv\Referable\Models;

use Jxclsv\Referable\Traits\Referable;
use Illuminate\Database\Eloquent\Model;
use Jxclsv\Referable\Contracts\DirectReferable;

class User extends Model implements DirectReferable
{
    use Referable;

    /**
     * setup route model binding key name
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'email';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
