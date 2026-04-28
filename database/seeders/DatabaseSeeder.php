<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 2. Create Super Admin User if it doesn't exist
        $adminEmail = 'admin@admin.com';
        $adminUser = User::where('email', $adminEmail)->first();
        
        if (!$adminUser) {
            $adminUser = User::create([
                'name' => 'Super Admin',
                'email' => $adminEmail,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active' => true,
            ]);
        }

        $adminUser->assignRole('super_admin');

        // 3. Run Indonesian Data Seeder
        $this->call([
            ShieldSeeder::class,
            ProductionDataSeeder::class,
        ]);
    }
}
