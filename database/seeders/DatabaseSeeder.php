<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'phone' => '123-456-7890',
                'birthdate' => '1990-01-01',
                'password' => bcrypt('password'),
            ]);
        }

        Category::factory(5)->create();
        Event::factory(20)->recycle(User::all())->recycle(Category::all())->create();
    }
}
