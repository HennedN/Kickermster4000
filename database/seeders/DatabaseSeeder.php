<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Matches;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Player::factory(10)->create();

        Matches::factory(10)->create();

        foreach (Player::all() as $player) {
            foreach (Matches::all() as $match) {
                $player->matches()->attach($match->id);
            }
        }
    }
}
