<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function create(Request $request)
    {
        Player::create([
            'vorname' => $request->vorname,
            'nachname' =>$request->nachname
        ]);

        return redirect()->route('player');
    }
    public function render()
    {
        $player = Player::orderBy('vorname')->get();
        return view('player', compact('player'));
    }
}
