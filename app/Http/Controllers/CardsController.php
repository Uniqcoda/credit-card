<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\User;
use Auth;

class CardsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('cards.create');
    }

    public function store(){
        $card = request()->validate([
            'brand' => 'required',
            'card_number' => 'required',
            'cvv' => 'required',
            'expire_at' => 'required',
        ]);

        auth()->user()->cards()->create($card);
        // throw an alert success message not yet working
        // alert('Card added successfully');
        return redirect('/cards');
    }

    public function show(){
        $user = Auth::user();
        $cards = Card::where('user_id', $user->id)->get();
        
        return view('cards.show', compact('cards'));

    }
}
