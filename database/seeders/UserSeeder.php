<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Buat User
        $userId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        // Buat Profile untuk User tersebut
        DB::table('profile')->insert([
            'age' => 25,
            'bio' => 'Mencintai berbagai macam genre film, sangat suka menonton film sci-fi.',
            'user_id' => $userId,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
