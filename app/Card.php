<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    // Get user that owns the card
    public function user(){
        return $this->belongsTo(User::class);
    }
}
