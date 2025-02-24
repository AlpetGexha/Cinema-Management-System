<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        DB::table('users')
            ->insert([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'is_admin' => true,
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);

        $categories = Category::factory(5)->create();

        Movie::factory(10)
            ->recycle($categories)
            ->create();
    }
}
