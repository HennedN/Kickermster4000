<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Matches;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'player1',
        'player2',
        'winner',
    ];

    public function matches()
    {
        return $this->belongsToMany(Matches::class);
    }

    public function player()
    {
        return $this->belongsToMany(Player::class);
    }
}
