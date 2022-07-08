<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'Score'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
