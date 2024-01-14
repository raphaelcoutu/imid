<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Facility;
use App\Models\Inventory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Facility::create([
            'name' => 'CHUS HF',
            'active' => true
        ], [
            'name' => 'Granby'
        ], [
            'name' => 'Cowansville'
        ], [
            'name' => 'IUGS'
        ]);

        Inventory::create([
            'name' => 'Len 25 mg',
            'batch' => 12345,
            'expiration_date' => Carbon::now()->endOfMonth()->toDate(),
            'status' => 'active'
        ]);

    }
}
