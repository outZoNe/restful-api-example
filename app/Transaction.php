<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'amount', 'type', 'date'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
