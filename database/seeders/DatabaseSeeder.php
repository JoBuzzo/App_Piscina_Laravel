<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Reserva::factory(30)->create();

        // \App\Models\Reserva::factory()->create([
        //     'name' => 'Test Reserva',
        //     'email' => 'test@example.com',
        // ]);
    }
}
