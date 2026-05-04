<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        $cast = DB::table('casts')->first();
        $film = DB::table('films')->first();

        if ($cast && $film) {
            DB::table('actors')->insert([
                'cast_id' => $cast->id,
                'film_id' => $film->id,
                'name' => 'Protagonist Role',
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
