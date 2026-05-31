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
        // Default masyarakat user created during registration.

        User::factory()->create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'phone' => '081200000001',
            'role' => User::ROLE_ADMIN,
            'password' => bcrypt('admin12345'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Petugas Lapangan',
            'email' => 'petugas@example.com',
            'phone' => '081200000002',
            'role' => User::ROLE_PETUGAS,
            'password' => bcrypt('petugas12345'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Test Masyarakat',
            'email' => 'masyarakat@example.com',
            'phone' => '081200000003',
            'role' => User::ROLE_MASYARAKAT,
            'password' => bcrypt('masyarakat12345'),
            'email_verified_at' => now(),
        ]);
    }
}
