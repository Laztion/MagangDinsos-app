<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\LaporanKegiatan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaporanKegiatanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LaporanKegiatan');
    }

    public function view(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        if ($authUser->hasRole(['super_admin', 'admin'])) {
            return true;
        }

        if ($authUser->hasRole('pembimbing_universitas')) {
            return $authUser->pembimbingUniversitas?->universitas_id === $laporanKegiatan->mahasiswa?->universitas_id;
        }

        if ($authUser->hasRole('pembimbing_perusahaan')) {
            return $authUser->pembimbingPerusahaan?->perusahaan_id === $laporanKegiatan->kegiatanMagang?->perusahaan_id;
        }

        if ($authUser->hasRole('mahasiswa')) {
            return $authUser->id === $laporanKegiatan->mahasiswa?->user_id;
        }

        return $authUser->can('View:LaporanKegiatan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LaporanKegiatan');
    }

    public function update(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        return $authUser->can('Update:LaporanKegiatan');
    }

    public function delete(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        return $authUser->can('Delete:LaporanKegiatan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LaporanKegiatan');
    }

    public function restore(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        return $authUser->can('Restore:LaporanKegiatan');
    }

    public function forceDelete(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        return $authUser->can('ForceDelete:LaporanKegiatan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LaporanKegiatan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LaporanKegiatan');
    }

    public function replicate(AuthUser $authUser, LaporanKegiatan $laporanKegiatan): bool
    {
        return $authUser->can('Replicate:LaporanKegiatan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LaporanKegiatan');
    }

}