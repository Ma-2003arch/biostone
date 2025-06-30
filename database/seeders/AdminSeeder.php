<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Création directe de l'utilisateur admin
        User::firstOrCreate(
            ['email' => 'admin2025@biostone.com'],
            [
                'id' => Str::uuid(),
                'name' => 'Admin', // Ajout du nom (recommandé)
                'password' => Hash::make('Biostone2025@'),
                'is_admin' => true
            ]
        );

        $this->command->info('Compte admin créé avec succès !');
    }
}
