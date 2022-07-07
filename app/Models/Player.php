<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'vorname',
        'nachname',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }


}
