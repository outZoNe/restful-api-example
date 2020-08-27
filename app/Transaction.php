<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public $timestamps = false;

    const CREATED_AT = 'date';

    protected $fillable = [
        'user_id', 'amount', 'type'
    ];
}
