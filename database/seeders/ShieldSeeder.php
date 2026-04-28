<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Define Roles
        $roles = [
            'super_admin',
            'admin',
            'mahasiswa',
            'pembimbing_perusahaan',
            'pembimbing_universitas',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // 2. Define Permissions for each resource
        $resources = [
            'User',
            'Role',
            'Permission',
            'Universitas',
            'Perusahaan',
            'Mahasiswa',
            'PembimbingUniversitas',
            'PembimbingPerusahaan',
            'KegiatanMagang',
            'LaporanKegiatan',
            'LampiranLaporan',
            'Penilaian',
            'KartuMagang',
            'RiwayatMagang',
        ];

        $actions = [
            'ViewAny',
            'View',
            'Create',
            'Update',
            'Delete',
            'DeleteAny',
            'Restore',
            'RestoreAny',
            'Replicate',
            'Reorder',
            'ForceDelete',
            'ForceDeleteAny',
        ];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$action}:{$resource}",
                    'guard_name' => 'web',
                ]);
            }
        }

        // 3. Assign Permissions to Roles

        // Super Admin & Admin: All permissions
        $allPermissions = Permission::all();
        Role::whereIn('name', ['super_admin', 'admin'])->each(function ($role) use ($allPermissions) {
            $role->syncPermissions($allPermissions);
        });

        // Mahasiswa: Can view/update their own (enforced by Policy)
        $mahasiswaPermissions = [
            'View:Mahasiswa', 'Update:Mahasiswa',
            'ViewAny:KegiatanMagang', 'View:KegiatanMagang',
            'ViewAny:LaporanKegiatan', 'View:LaporanKegiatan', 'Create:LaporanKegiatan', 'Update:LaporanKegiatan',
            'ViewAny:LampiranLaporan', 'View:LampiranLaporan', 'Create:LampiranLaporan', 'Update:LampiranLaporan',
            'ViewAny:KartuMagang', 'View:KartuMagang',
            'ViewAny:RiwayatMagang', 'View:RiwayatMagang',
            'ViewAny:Penilaian', 'View:Penilaian',
        ];
        $this->syncRolePermissions('mahasiswa', $mahasiswaPermissions);

        // Pembimbing Universitas
        $pembimbingUniPermissions = [
            'ViewAny:Mahasiswa', 'View:Mahasiswa',
            'ViewAny:KegiatanMagang', 'View:KegiatanMagang',
            'ViewAny:LaporanKegiatan', 'View:LaporanKegiatan',
            'ViewAny:LampiranLaporan', 'View:LampiranLaporan',
            'ViewAny:Penilaian', 'View:Penilaian', 'Create:Penilaian', 'Update:Penilaian',
            'ViewAny:Universitas', 'View:Universitas',
        ];
        $this->syncRolePermissions('pembimbing_universitas', $pembimbingUniPermissions);

        // Pembimbing Perusahaan
        $pembimbingPerushPermissions = [
            'ViewAny:Mahasiswa', 'View:Mahasiswa',
            'ViewAny:KegiatanMagang', 'View:KegiatanMagang',
            'ViewAny:LaporanKegiatan', 'View:LaporanKegiatan',
            'ViewAny:Penilaian', 'View:Penilaian', 'Create:Penilaian', 'Update:Penilaian',
            'ViewAny:Perusahaan', 'View:Perusahaan',
        ];
        $this->syncRolePermissions('pembimbing_perusahaan', $pembimbingPerushPermissions);

        $this->command->info('Shield Seeding Completed successfully with clean roles.');
    }

    protected function syncRolePermissions(string $roleName, array $permissionNames): void
    {
        $role = Role::whereName($roleName)->first();
        if ($role) {
            $permissions = Permission::whereIn('name', $permissionNames)->get();
            $role->syncPermissions($permissions);
        }
    }
}
