<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $user = User::factory(5)->create();

       DB::table('categories')->insert([
           'name' => 'Personal',
           'slug' => 'personal'
       ]);

        DB::table('categories')->insert([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        DB::table('categories')->insert([
            'name' => 'Family',
            'slug' => 'family'
        ]);
       //Category::create([
       //    'name' => 'Personal',
       //    'slug' => 'personal'
       //]);

       //Category::create([
       //     'name' => 'Work',
       //     'slug'=> 'work'
       // ]);
       // Category::create([
       //     'name' => 'Family',
       //     'slug'=> 'family'
       // ]);

        // User::factory()->create([
       //     'name' => 'Test User',
       //     'email' => 'test@example.com',
       // ]);
    }
}
