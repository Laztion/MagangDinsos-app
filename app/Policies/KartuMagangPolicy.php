<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\KartuMagang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class KartuMagangPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        if ($authUser->can('ViewAny:KartuMagang')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas') && $authUser->pembimbingUniversitas) {
            return true;
        }

        if ($authUser->hasRole('pembimbing_perusahaan') && $authUser->pembimbingPerusahaan) {
            return true;
        }

        return false;
    }

    public function view(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        if ($authUser->can('View:KartuMagang')) {
            return true;
        }

        return $this->hasSameAttribute($authUser, $kartuMagang);
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KartuMagang');
    }

    public function update(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        if ($authUser->can('Update:KartuMagang')) {
            return true;
        }

        return $this->hasSameAttribute($authUser, $kartuMagang);
    }

    public function delete(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('Delete:KartuMagang');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KartuMagang');
    }

    public function restore(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('Restore:KartuMagang');
    }

    public function forceDelete(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('ForceDelete:KartuMagang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KartuMagang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KartuMagang');
    }

    public function replicate(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('Replicate:KartuMagang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KartuMagang');
    }

    /**
     * Cek apakah pembimbing memiliki atribut yang sama dengan record KartuMagang.
     * - Pembimbing Universitas: universitas_id sama via mahasiswa
     * - Pembimbing Perusahaan: perusahaan_id sama via kegiatanMagang
     */
    private function hasSameAttribute(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas')) {
            $pembimbing = $authUser->pembimbingUniversitas;
            if ($pembimbing && $kartuMagang->mahasiswa) {
                return $kartuMagang->mahasiswa->universitas_id === $pembimbing->universitas_id;
            }
        }

        if ($authUser->hasRole('pembimbing_perusahaan')) {
            $pembimbing = $authUser->pembimbingPerusahaan;
            if ($pembimbing && $kartuMagang->kegiatanMagang) {
                return $kartuMagang->kegiatanMagang->perusahaan_id === $pembimbing->perusahaan_id;
            }
        }

        return false;
    }
}
