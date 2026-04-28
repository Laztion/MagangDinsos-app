<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KegiatanMagang;
use Illuminate\Auth\Access\HandlesAuthorization;

class KegiatanMagangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KegiatanMagang');
    }

    public function view(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        if ($authUser->hasRole(['super_admin', 'admin'])) {
            return true;
        }

        if ($authUser->hasRole('pembimbing_universitas')) {
            return $authUser->pembimbingUniversitas?->universitas_id === $kegiatanMagang->mahasiswa?->universitas_id;
        }

        if ($authUser->hasRole('pembimbing_perusahaan')) {
            return $authUser->pembimbingPerusahaan?->perusahaan_id === $kegiatanMagang->perusahaan_id;
        }

        if ($authUser->hasRole('mahasiswa')) {
            return $authUser->id === $kegiatanMagang->mahasiswa?->user_id;
        }

        return $authUser->can('View:KegiatanMagang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KegiatanMagang');
    }

    public function update(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        return $authUser->can('Update:KegiatanMagang');
    }

    public function delete(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        return $authUser->can('Delete:KegiatanMagang');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KegiatanMagang');
    }

    public function restore(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        return $authUser->can('Restore:KegiatanMagang');
    }

    public function forceDelete(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        return $authUser->can('ForceDelete:KegiatanMagang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KegiatanMagang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KegiatanMagang');
    }

    public function replicate(AuthUser $authUser, KegiatanMagang $kegiatanMagang): bool
    {
        return $authUser->can('Replicate:KegiatanMagang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KegiatanMagang');
    }

}