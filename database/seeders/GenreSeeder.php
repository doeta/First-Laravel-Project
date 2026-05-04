<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $genres = [
            'Action', 'Adventure', 'Animation', 'Biography', 'Comedy', 
            'Crime', 'Documentary', 'Drama', 'Family', 'Fantasy', 
            'Film Noir', 'History', 'Horror', 'Music', 'Musical', 
            'Mystery', 'Romance', 'Sci-Fi', 'Short Film', 'Sport', 
            'Superhero', 'Thriller', 'War', 'Western'
        ];

        $data = [];
        foreach ($genres as $genre) {
            $data[] = [
                'name' => $genre,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }

        DB::table('genres')->insert($data);
    }
}
