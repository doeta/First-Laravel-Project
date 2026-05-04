<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        // Ambil ID genre Sci-Fi atau Fallback ke ID 1
        $genre = DB::table('genres')->where('name', 'Sci-Fi')->first();
        $genreId = $genre ? $genre->id : 1;

        DB::table('films')->insert([
            [
                'title' => 'The Great Space Exploration',
                'summary' => 'A journey beyond the stars to find a new home for humanity.',
                'release_year' => '2023',
                'poster' => 'space_poster.jpg',
                'genre_id' => $genreId,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
