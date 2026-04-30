<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Universitas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class UniversitasPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        if ($authUser->can('ViewAny:Universitas')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas') || $authUser->hasRole('pembimbing_perusahaan')) {
            return true;
        }

        return false;
    }

    public function view(AuthUser $authUser, Universitas $universitas): bool
    {
        if ($authUser->can('View:Universitas')) {
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
        return $authUser->can('Create:Universitas');
    }

    public function update(AuthUser $authUser, Universitas $universitas): bool
    {
        if ($authUser->can('Update:Universitas')) {
            return true;
        }

        /** @var User $authUser */
        if ($authUser->hasRole('pembimbing_universitas')) {
            $pembimbing = $authUser->pembimbingUniversitas;
            if ($pembimbing) {
                return $universitas->id === $pembimbing->universitas_id;
            }
        }

        return false;
    }

    public function delete(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('Delete:Universitas');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Universitas');
    }

    public function restore(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('Restore:Universitas');
    }

    public function forceDelete(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('ForceDelete:Universitas');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Universitas');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Universitas');
    }

    public function replicate(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('Replicate:Universitas');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Universitas');
    }
}
