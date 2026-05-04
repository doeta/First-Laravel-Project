<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        $user = DB::table('users')->first();
        $film = DB::table('films')->first();

        if ($user && $film) {
            DB::table('reviews')->insert([
                'user_id' => $user->id,
                'film_id' => $film->id,
                'content' => 'Absolutely fantastic movie! Outstanding visual effects.',
                'point' => 9,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
