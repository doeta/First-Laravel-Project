<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        
        DB::table('casts')->insert([
            [
                'name' => 'John Doe',
                'age' => 35,
                'bio' => 'A famous actor from Hollywood best known for his action movies.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Jane Smith',
                'age' => 28,
                'bio' => 'An award-winning actress who excels in dramatic roles.',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
