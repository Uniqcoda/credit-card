<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Uuid;

    /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [
    'user_id','brand', 'card_number', 'cvv', 'expire_at'
];
    // Get user that owns the card
    public function user(){
        return $this->belongsTo(User::class);
    }
}
