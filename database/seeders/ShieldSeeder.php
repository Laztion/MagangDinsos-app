<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $tenants = '[]';
        $users = '[]';
        $userTenantPivot = '[]';
        $rolesWithPermissions = '[{"name":"Super Admin","guard_name":"web","permissions":[]},{"name":"Mahasiswa","guard_name":"web","permissions":["access KartuMagang","edit KartuMagang","access KegiatanMagang","edit KegiatanMagang","access LampiranLaporan","edit LampiranLaporan","access LaporanKegiatan","edit LaporanKegiatan","access Mahasiswa","edit Mahasiswa","access Penilaian","access RiwayatMagang","view_any_KartuMagang","view_KartuMagang","create_KartuMagang","update_KartuMagang","view_any_KegiatanMagang","view_KegiatanMagang","create_KegiatanMagang","update_KegiatanMagang","view_any_LampiranLaporan","view_LampiranLaporan","create_LampiranLaporan","update_LampiranLaporan","view_any_LaporanKegiatan","view_LaporanKegiatan","create_LaporanKegiatan","update_LaporanKegiatan","view_any_Mahasiswa","view_Mahasiswa","create_Mahasiswa","update_Mahasiswa","view_any_Penilaian","view_Penilaian","create_Penilaian","update_Penilaian","view_any_RiwayatMagang","view_RiwayatMagang","create_RiwayatMagang","update_RiwayatMagang","view_Universita"]},{"name":"Perusahaan","guard_name":"web","permissions":["access Mahasiswa","access PembimbingPerusahaan","access Penilaian"]},{"name":"Pembimbing Universitas","guard_name":"web","permissions":[]},{"name":"Pembimbing Perusahaan","guard_name":"web","permissions":[]},{"name":"Table Viewer","guard_name":"web","permissions":["access KartuMagang","access KegiatanMagang","access LampiranLaporan","access LaporanKegiatan","access Mahasiswa","access PembimbingPerusahaan","access Penilaian","access Permission","access Perusahaan","access RiwayatMagang","access Role","access User","view_any_KartuMagang","view_KartuMagang","view_any_KegiatanMagang","view_KegiatanMagang","view_any_LampiranLaporan","view_LampiranLaporan","view_any_LaporanKegiatan","view_LaporanKegiatan","view_any_Mahasiswa","view_Mahasiswa","view_any_PembimbingPerusahaan","view_PembimbingPerusahaan","view_any_PembimbingUniversita","view_PembimbingUniversita","view_any_Penilaian","view_Penilaian","view_any_Permission","view_Permission","view_any_Perusahaan","view_Perusahaan","view_any_RiwayatMagang","view_RiwayatMagang","view_any_Role","view_Role","view_any_Universita","view_Universita","view_any_User","view_User","view_any_PembimbingUniversitas","view_PembimbingUniversitas","view_any_Universitas","view_Universitas","access PembimbingUniversitas","access Universitas"]},{"name":"Table Editor","guard_name":"web","permissions":["access KartuMagang","access KegiatanMagang","access LampiranLaporan","access LaporanKegiatan","access Mahasiswa","access PembimbingPerusahaan","access Penilaian","access Permission","access Perusahaan","access RiwayatMagang","access Role","access User","view_any_KartuMagang","view_KartuMagang","update_KartuMagang","view_any_KegiatanMagang","view_KegiatanMagang","update_KegiatanMagang","view_any_LampiranLaporan","view_LampiranLaporan","update_LampiranLaporan","view_any_LaporanKegiatan","view_LaporanKegiatan","update_LaporanKegiatan","view_any_Mahasiswa","view_Mahasiswa","update_Mahasiswa","view_any_PembimbingPerusahaan","view_PembimbingPerusahaan","update_PembimbingPerusahaan","view_any_PembimbingUniversita","view_PembimbingUniversita","update_PembimbingUniversita","view_any_Penilaian","view_Penilaian","update_Penilaian","view_any_Permission","view_Permission","update_Permission","view_any_Perusahaan","view_Perusahaan","update_Perusahaan","view_any_RiwayatMagang","view_RiwayatMagang","update_RiwayatMagang","view_any_Role","view_Role","update_Role","view_any_Universita","view_Universita","update_Universita","view_any_User","view_User","update_User","view_any_PembimbingUniversitas","view_PembimbingUniversitas","update_PembimbingUniversitas","view_any_Universitas","view_Universitas","update_Universitas","access PembimbingUniversitas","access Universitas"]},{"name":"Single Creator","guard_name":"web","permissions":["access KartuMagang","access KegiatanMagang","access LampiranLaporan","access LaporanKegiatan","access Mahasiswa","access PembimbingPerusahaan","access Penilaian","access Permission","access Perusahaan","access RiwayatMagang","access Role","access User","view_any_KartuMagang","view_KartuMagang","create_KartuMagang","view_any_KegiatanMagang","view_KegiatanMagang","create_KegiatanMagang","view_any_LampiranLaporan","view_LampiranLaporan","create_LampiranLaporan","view_any_LaporanKegiatan","view_LaporanKegiatan","create_LaporanKegiatan","view_any_Mahasiswa","view_Mahasiswa","create_Mahasiswa","view_any_PembimbingPerusahaan","view_PembimbingPerusahaan","create_PembimbingPerusahaan","view_any_PembimbingUniversita","view_PembimbingUniversita","create_PembimbingUniversita","view_any_Penilaian","view_Penilaian","create_Penilaian","view_any_Permission","view_Permission","create_Permission","view_any_Perusahaan","view_Perusahaan","create_Perusahaan","view_any_RiwayatMagang","view_RiwayatMagang","create_RiwayatMagang","view_any_Role","view_Role","create_Role","view_any_Universita","view_Universita","create_Universita","view_any_User","view_User","create_User","view_any_PembimbingUniversitas","view_PembimbingUniversitas","create_PembimbingUniversitas","view_any_Universitas","view_Universitas","create_Universitas","access PembimbingUniversitas","access Universitas"]},{"name":"super_admin","guard_name":"web","permissions":["ViewAny:Role","View:Role","Create:Role","Update:Role","Delete:Role","DeleteAny:Role","Restore:Role","ForceDelete:Role","ForceDeleteAny:Role","RestoreAny:Role","Replicate:Role","Reorder:Role","ViewAny:KartuMagang","View:KartuMagang","Create:KartuMagang","Update:KartuMagang","Delete:KartuMagang","DeleteAny:KartuMagang","Restore:KartuMagang","ForceDelete:KartuMagang","ForceDeleteAny:KartuMagang","RestoreAny:KartuMagang","Replicate:KartuMagang","Reorder:KartuMagang","ViewAny:KegiatanMagang","View:KegiatanMagang","Create:KegiatanMagang","Update:KegiatanMagang","Delete:KegiatanMagang","DeleteAny:KegiatanMagang","Restore:KegiatanMagang","ForceDelete:KegiatanMagang","ForceDeleteAny:KegiatanMagang","RestoreAny:KegiatanMagang","Replicate:KegiatanMagang","Reorder:KegiatanMagang","ViewAny:LampiranLaporan","View:LampiranLaporan","Create:LampiranLaporan","Update:LampiranLaporan","Delete:LampiranLaporan","DeleteAny:LampiranLaporan","Restore:LampiranLaporan","ForceDelete:LampiranLaporan","ForceDeleteAny:LampiranLaporan","RestoreAny:LampiranLaporan","Replicate:LampiranLaporan","Reorder:LampiranLaporan","ViewAny:LaporanKegiatan","View:LaporanKegiatan","Create:LaporanKegiatan","Update:LaporanKegiatan","Delete:LaporanKegiatan","DeleteAny:LaporanKegiatan","Restore:LaporanKegiatan","ForceDelete:LaporanKegiatan","ForceDeleteAny:LaporanKegiatan","RestoreAny:LaporanKegiatan","Replicate:LaporanKegiatan","Reorder:LaporanKegiatan","ViewAny:Mahasiswa","View:Mahasiswa","Create:Mahasiswa","Update:Mahasiswa","Delete:Mahasiswa","DeleteAny:Mahasiswa","Restore:Mahasiswa","ForceDelete:Mahasiswa","ForceDeleteAny:Mahasiswa","RestoreAny:Mahasiswa","Replicate:Mahasiswa","Reorder:Mahasiswa","ViewAny:PembimbingPerusahaan","View:PembimbingPerusahaan","Create:PembimbingPerusahaan","Update:PembimbingPerusahaan","Delete:PembimbingPerusahaan","DeleteAny:PembimbingPerusahaan","Restore:PembimbingPerusahaan","ForceDelete:PembimbingPerusahaan","ForceDeleteAny:PembimbingPerusahaan","RestoreAny:PembimbingPerusahaan","Replicate:PembimbingPerusahaan","Reorder:PembimbingPerusahaan","ViewAny:PembimbingUniversitas","View:PembimbingUniversitas","Create:PembimbingUniversitas","Update:PembimbingUniversitas","Delete:PembimbingUniversitas","DeleteAny:PembimbingUniversitas","Restore:PembimbingUniversitas","ForceDelete:PembimbingUniversitas","ForceDeleteAny:PembimbingUniversitas","RestoreAny:PembimbingUniversitas","Replicate:PembimbingUniversitas","Reorder:PembimbingUniversitas","ViewAny:Penilaian","View:Penilaian","Create:Penilaian","Update:Penilaian","Delete:Penilaian","DeleteAny:Penilaian","Restore:Penilaian","ForceDelete:Penilaian","ForceDeleteAny:Penilaian","RestoreAny:Penilaian","Replicate:Penilaian","Reorder:Penilaian","ViewAny:Permission","View:Permission","Create:Permission","Update:Permission","Delete:Permission","DeleteAny:Permission","Restore:Permission","ForceDelete:Permission","ForceDeleteAny:Permission","RestoreAny:Permission","Replicate:Permission","Reorder:Permission","ViewAny:Perusahaan","View:Perusahaan","Create:Perusahaan","Update:Perusahaan","Delete:Perusahaan","DeleteAny:Perusahaan","Restore:Perusahaan","ForceDelete:Perusahaan","ForceDeleteAny:Perusahaan","RestoreAny:Perusahaan","Replicate:Perusahaan","Reorder:Perusahaan","ViewAny:RiwayatMagang","View:RiwayatMagang","Create:RiwayatMagang","Update:RiwayatMagang","Delete:RiwayatMagang","DeleteAny:RiwayatMagang","Restore:RiwayatMagang","ForceDelete:RiwayatMagang","ForceDeleteAny:RiwayatMagang","RestoreAny:RiwayatMagang","Replicate:RiwayatMagang","Reorder:RiwayatMagang","ViewAny:Universitas","View:Universitas","Create:Universitas","Update:Universitas","Delete:Universitas","DeleteAny:Universitas","Restore:Universitas","ForceDelete:Universitas","ForceDeleteAny:Universitas","RestoreAny:Universitas","Replicate:Universitas","Reorder:Universitas","ViewAny:User","View:User","Create:User","Update:User","Delete:User","DeleteAny:User","Restore:User","ForceDelete:User","ForceDeleteAny:User","RestoreAny:User","Replicate:User","Reorder:User"]}]';
        $directPermissions = '{"1":{"name":"create KartuMagang","guard_name":"web"},"3":{"name":"delete KartuMagang","guard_name":"web"},"5":{"name":"create KegiatanMagang","guard_name":"web"},"7":{"name":"delete KegiatanMagang","guard_name":"web"},"9":{"name":"create LampiranLaporan","guard_name":"web"},"11":{"name":"delete LampiranLaporan","guard_name":"web"},"13":{"name":"create LaporanKegiatan","guard_name":"web"},"15":{"name":"delete LaporanKegiatan","guard_name":"web"},"17":{"name":"create Mahasiswa","guard_name":"web"},"19":{"name":"delete Mahasiswa","guard_name":"web"},"21":{"name":"create PembimbingPerusahaan","guard_name":"web"},"22":{"name":"edit PembimbingPerusahaan","guard_name":"web"},"23":{"name":"delete PembimbingPerusahaan","guard_name":"web"},"24":{"name":"access PembimbingUniversita","guard_name":"web"},"25":{"name":"create PembimbingUniversita","guard_name":"web"},"26":{"name":"edit PembimbingUniversita","guard_name":"web"},"27":{"name":"delete PembimbingUniversita","guard_name":"web"},"29":{"name":"create Penilaian","guard_name":"web"},"30":{"name":"edit Penilaian","guard_name":"web"},"31":{"name":"delete Penilaian","guard_name":"web"},"33":{"name":"create Permission","guard_name":"web"},"34":{"name":"edit Permission","guard_name":"web"},"35":{"name":"delete Permission","guard_name":"web"},"37":{"name":"create Perusahaan","guard_name":"web"},"38":{"name":"edit Perusahaan","guard_name":"web"},"39":{"name":"delete Perusahaan","guard_name":"web"},"41":{"name":"create RiwayatMagang","guard_name":"web"},"42":{"name":"edit RiwayatMagang","guard_name":"web"},"43":{"name":"delete RiwayatMagang","guard_name":"web"},"45":{"name":"create Role","guard_name":"web"},"46":{"name":"edit Role","guard_name":"web"},"47":{"name":"delete Role","guard_name":"web"},"48":{"name":"access Universita","guard_name":"web"},"49":{"name":"create Universita","guard_name":"web"},"50":{"name":"edit Universita","guard_name":"web"},"51":{"name":"delete Universita","guard_name":"web"},"53":{"name":"create User","guard_name":"web"},"54":{"name":"edit User","guard_name":"web"},"55":{"name":"delete User","guard_name":"web"},"60":{"name":"delete_KartuMagang","guard_name":"web"},"65":{"name":"delete_KegiatanMagang","guard_name":"web"},"70":{"name":"delete_LampiranLaporan","guard_name":"web"},"75":{"name":"delete_LaporanKegiatan","guard_name":"web"},"80":{"name":"delete_Mahasiswa","guard_name":"web"},"85":{"name":"delete_PembimbingPerusahaan","guard_name":"web"},"90":{"name":"delete_PembimbingUniversita","guard_name":"web"},"95":{"name":"delete_Penilaian","guard_name":"web"},"100":{"name":"delete_Permission","guard_name":"web"},"105":{"name":"delete_Perusahaan","guard_name":"web"},"110":{"name":"delete_RiwayatMagang","guard_name":"web"},"115":{"name":"delete_Role","guard_name":"web"},"120":{"name":"delete_Universita","guard_name":"web"},"125":{"name":"delete_User","guard_name":"web"},"130":{"name":"delete_PembimbingUniversitas","guard_name":"web"},"135":{"name":"delete_Universitas","guard_name":"web"},"136":{"name":"access_Mahasiswa","guard_name":"web"},"137":{"name":"access_Perusahaan","guard_name":"web"},"138":{"name":"access_PembimbingUniversitas","guard_name":"web"},"140":{"name":"access_PembimbingPerusahaan","guard_name":"web"},"141":{"name":"access_KegiatanMagang","guard_name":"web"},"142":{"name":"access_LaporanKegiatan","guard_name":"web"},"143":{"name":"access_LampiranLaporan","guard_name":"web"},"144":{"name":"access_RiwayatMagang","guard_name":"web"},"145":{"name":"access_KartuMagang","guard_name":"web"},"146":{"name":"access_Penilaian","guard_name":"web"},"147":{"name":"access_Universitas","guard_name":"web"},"149":{"name":"access_User","guard_name":"web"},"150":{"name":"access_Role","guard_name":"web"},"151":{"name":"access_Permission","guard_name":"web"}}';

        // 1. Seed tenants first (if present)
        if (! blank($tenants) && $tenants !== '[]') {
            static::seedTenants($tenants);
        }

        // 2. Seed roles with permissions
        static::makeRolesWithPermissions($rolesWithPermissions);

        // 3. Seed direct permissions
        static::makeDirectPermissions($directPermissions);

        // 4. Seed users with their roles/permissions (if present)
        if (! blank($users) && $users !== '[]') {
            static::seedUsers($users);
        }

        // 5. Seed user-tenant pivot (if present)
        if (! blank($userTenantPivot) && $userTenantPivot !== '[]') {
            static::seedUserTenantPivot($userTenantPivot);
        }

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function seedTenants(string $tenants): void
    {
        if (blank($tenantData = json_decode($tenants, true))) {
            return;
        }

        $tenantModel = '';
        if (blank($tenantModel)) {
            return;
        }

        foreach ($tenantData as $tenant) {
            $tenantModel::firstOrCreate(
                ['id' => $tenant['id']],
                $tenant
            );
        }
    }

    protected static function seedUsers(string $users): void
    {
        if (blank($userData = json_decode($users, true))) {
            return;
        }

        $userModel = 'App\Models\User';
        $tenancyEnabled = false;

        foreach ($userData as $data) {
            // Extract role/permission data before creating user
            $roles = $data['roles'] ?? [];
            $permissions = $data['permissions'] ?? [];
            $tenantRoles = $data['tenant_roles'] ?? [];
            $tenantPermissions = $data['tenant_permissions'] ?? [];
            unset($data['roles'], $data['permissions'], $data['tenant_roles'], $data['tenant_permissions']);

            $user = $userModel::firstOrCreate(
                ['email' => $data['email']],
                $data
            );

            // Handle tenancy mode - sync roles/permissions per tenant
            if ($tenancyEnabled && (! empty($tenantRoles) || ! empty($tenantPermissions))) {
                foreach ($tenantRoles as $tenantId => $roleNames) {
                    $contextId = $tenantId === '_global' ? null : $tenantId;
                    setPermissionsTeamId($contextId);
                    $user->syncRoles($roleNames);
                }

                foreach ($tenantPermissions as $tenantId => $permissionNames) {
                    $contextId = $tenantId === '_global' ? null : $tenantId;
                    setPermissionsTeamId($contextId);
                    $user->syncPermissions($permissionNames);
                }
            } else {
                // Non-tenancy mode
                if (! empty($roles)) {
                    $user->syncRoles($roles);
                }

                if (! empty($permissions)) {
                    $user->syncPermissions($permissions);
                }
            }
        }
    }

    protected static function seedUserTenantPivot(string $pivot): void
    {
        if (blank($pivotData = json_decode($pivot, true))) {
            return;
        }

        $pivotTable = '';
        if (blank($pivotTable)) {
            return;
        }

        foreach ($pivotData as $row) {
            $uniqueKeys = [];

            if (isset($row['user_id'])) {
                $uniqueKeys['user_id'] = $row['user_id'];
            }

            $tenantForeignKey = 'team_id';
            if (! blank($tenantForeignKey) && isset($row[$tenantForeignKey])) {
                $uniqueKeys[$tenantForeignKey] = $row[$tenantForeignKey];
            }

            if (! empty($uniqueKeys)) {
                DB::table($pivotTable)->updateOrInsert($uniqueKeys, $row);
            }
        }
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            return;
        }

        /** @var \Illuminate\Database\Eloquent\Model $roleModel */
        $roleModel = Utils::getRoleModel();
        /** @var \Illuminate\Database\Eloquent\Model $permissionModel */
        $permissionModel = Utils::getPermissionModel();

        $tenancyEnabled = false;
        $teamForeignKey = 'team_id';

        foreach ($rolePlusPermissions as $rolePlusPermission) {
            $tenantId = $rolePlusPermission[$teamForeignKey] ?? null;

            // Set tenant context for role creation and permission sync
            if ($tenancyEnabled) {
                setPermissionsTeamId($tenantId);
            }

            $roleData = [
                'name' => $rolePlusPermission['name'],
                'guard_name' => $rolePlusPermission['guard_name'],
            ];

            // Include tenant ID in role data (can be null for global roles)
            if ($tenancyEnabled && ! blank($teamForeignKey)) {
                $roleData[$teamForeignKey] = $tenantId;
            }

            $role = $roleModel::firstOrCreate($roleData);

            if (! blank($rolePlusPermission['permissions'])) {
                $permissionModels = collect($rolePlusPermission['permissions'])
                    ->map(fn ($permission) => $permissionModel::firstOrCreate([
                        'name' => $permission,
                        'guard_name' => $rolePlusPermission['guard_name'],
                    ]))
                    ->all();

                $role->syncPermissions($permissionModels);
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (blank($permissions = json_decode($directPermissions, true))) {
            return;
        }

        /** @var \Illuminate\Database\Eloquent\Model $permissionModel */
        $permissionModel = Utils::getPermissionModel();

        foreach ($permissions as $permission) {
            if ($permissionModel::whereName($permission['name'])->doesntExist()) {
                $permissionModel::create([
                    'name' => $permission['name'],
                    'guard_name' => $permission['guard_name'],
                ]);
            }
        }
    }
}
