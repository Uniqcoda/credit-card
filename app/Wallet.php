<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use Uuid;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','balance', 
    ];

        // Get user that owns the wallet
        public function user(){
            return $this->belongsTo(User::class);
        }
}
