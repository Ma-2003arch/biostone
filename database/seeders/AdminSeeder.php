<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role; // Ajout correct de l'import
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Création du rôle admin s'il n'existe pas
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['id' => Str::uuid()]
        );

        // Création de l'utilisateur admin s'il n'existe pas
        User::firstOrCreate(
            ['email' => 'admin2025@biostone.com'],
            [
                'id' => Str::uuid(),
                'name' => 'Admin',
                'password' => Hash::make('Biostone2025'),
                'is_admin' => true
            ]
        );

        $this->command->info('Compte admin et rôle configurés avec succès !');
    }
    
}
