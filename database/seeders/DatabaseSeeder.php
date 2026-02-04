<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Usuario administrador
        User::factory()->create([
            'name' => 'Admin SerraInnova',
            'email' => 'admin@serrainnova.es',
        ]);

        // Cargar seeders
        $this->call([
            PropertySeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
