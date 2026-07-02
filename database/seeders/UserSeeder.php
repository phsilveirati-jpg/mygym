<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gym.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Daniel',
            'email' => 'daniel@gym.com',
            'role' => 'instructor',
        ]);
        User::factory()->create([
            'name' => 'Camilo',
            'email' => 'camilo@gym.com',
            'role' => 'instructor',
        ]);
        User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@gym.com',
        ]);
        User::factory()->create([
            'name' => 'Carla',
            'email' => 'carla@gym.com',
        ]);
        User::factory()->count(10)->create();
        User::factory()->count(10)->create([
            'role' => 'instructor',
        ]);
    }
}
