<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class PerusahaanPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        if ($authUser->can('ViewAny:Perusahaan')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas') || $authUser->hasRole('pembimbing_perusahaan')) {
            return true;
        }

        return false;
    }

    public function view(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        if ($authUser->can('View:Perusahaan')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas') || $authUser->hasRole('pembimbing_perusahaan')) {
            return true;
        }

        return false;
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Perusahaan');
    }

    public function update(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        if ($authUser->can('Update:Perusahaan')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_perusahaan')) {
            $pembimbing = $authUser->pembimbingPerusahaan;
            if ($pembimbing) {
                return $perusahaan->id === $pembimbing->perusahaan_id;
            }
        }

        return false;
    }

    public function delete(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        return $authUser->can('Delete:Perusahaan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Perusahaan');
    }

    public function restore(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        return $authUser->can('Restore:Perusahaan');
    }

    public function forceDelete(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        return $authUser->can('ForceDelete:Perusahaan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Perusahaan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Perusahaan');
    }

    public function replicate(AuthUser $authUser, Perusahaan $perusahaan): bool
    {
        return $authUser->can('Replicate:Perusahaan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Perusahaan');
    }
}
