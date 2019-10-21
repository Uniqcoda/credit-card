<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
        // Get user that owns the wallet
        public function user(){
            return $this->belongsTo(User::class);
        }
}
