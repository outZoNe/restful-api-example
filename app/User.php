<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'nickname', 'currency'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
