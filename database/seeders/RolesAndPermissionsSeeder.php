<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create Permissions per Resource
        $resources = [
            'KartuMagangResource',
            'KegiatanMagangResource',
            'LampiranLaporanResource',
            'LaporanKegiatanResource',
            'MahasiswaResource',
            'PembimbingPerusahaanResource',
            'PembimbingUniversitasResource',
            'PenilaianResource',
            'PermissionResource',
            'PerusahaanResource',
            'RiwayatMagangResource',
            'RoleResource',
            'UniversitasResource',
            'UserResource'
        ];

        foreach ($resources as $resource) {
            Permission::firstOrCreate(['name' => "access {$resource}", 'guard_name' => 'web']);
        }

        // 2. Create Roles
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $roleMahasiswa = Role::firstOrCreate(['name' => 'Mahasiswa', 'guard_name' => 'web']);
        $rolePerusahaan = Role::firstOrCreate(['name' => 'Perusahaan', 'guard_name' => 'web']);
        $rolePembimbingUni = Role::firstOrCreate(['name' => 'Pembimbing Universitas', 'guard_name' => 'web']);
        $rolePembimbingPerush = Role::firstOrCreate(['name' => 'Pembimbing Perusahaan', 'guard_name' => 'web']);

        // 3. Assign Default Permissions to Roles (Admin gets everything via Gate::before)
        
        // Example: Mahasiswa can access specific resources
        $mahasiswaPerms = [
            'access KegiatanMagangResource',
            'access LaporanKegiatanResource',
            'access LampiranLaporanResource',
            'access RiwayatMagangResource',
            'access KartuMagangResource',
            'access PenilaianResource'
        ];
        $roleMahasiswa->syncPermissions($mahasiswaPerms);

        // Example: Perusahaan can access their specific resources
        $perusahaanPerms = [
            'access PembimbingPerusahaanResource',
            'access PenilaianResource',
            'access MahasiswaResource'
        ];
        $rolePerusahaan->syncPermissions($perusahaanPerms);

        // 4. Assign 'Super Admin' role to the first user
        $user = \App\Models\User::first();
        if ($user && !$user->hasRole('Super Admin')) {
            $user->assignRole('Super Admin');
        }
    }
}
