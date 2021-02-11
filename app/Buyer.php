<?php

namespace App;

use App\Scopes\BuyerScope;
use App\User;
use App\Transaction;

class Buyer extends User
{

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::addGlobalScope(new BuyerScope);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
