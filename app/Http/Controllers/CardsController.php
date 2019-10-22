<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function create(){
        return view('cards.create');
    }

    public function store(){
        $data = request()->validate([
            'brand' => 'required',
            'card_number' => 'required',
            'cvv' => 'required',
            'expire_at' => 'required',
        ]);

        auth()->user()->cards()->create($data);
    }
}
