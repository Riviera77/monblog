<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
['email' => 'admin@monblog.com'], // ← Critère d'unicité
    [ // ← Champs à mettre à jour ou créer
                'name' => 'Grey Admin',
                'password' => Hash::make('monblog47!'),
                'is_admin' => true,
                'role' => 'admin',
        ]
);
    }
}