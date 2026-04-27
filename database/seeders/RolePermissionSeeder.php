<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role super_admin (bypass semua permission via Gate)
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);

        // Buat role admin (punya semua permission)
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        // Buat role operator (baca saja)
        $operator = Role::firstOrCreate(['name' => 'operator', 'guard_name' => 'web']);

        // Buat role mahasiswa (akses terbatas)
        $mahasiswa = Role::firstOrCreate(['name' => 'mahasiswa', 'guard_name' => 'web']);

        $this->command->info('✓ Roles created: super_admin, admin, operator, mahasiswa');

        // Assign super_admin ke user pertama (jika ada)
        $firstUser = User::first();
        if ($firstUser) {
            $firstUser->assignRole('super_admin');
            $this->command->info("✓ super_admin assigned to: {$firstUser->email}");
        } else {
            $this->command->warn('⚠ No user found. Create a user first then run: php artisan shield:super-admin --user=1');
        }
    }
}
