<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PembimbingUniversitas;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembimbingUniversitasPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PembimbingUniversitas');
    }

    public function view(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('View:PembimbingUniversitas');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PembimbingUniversitas');
    }

    public function update(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('Update:PembimbingUniversitas');
    }

    public function delete(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('Delete:PembimbingUniversitas');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PembimbingUniversitas');
    }

    public function restore(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('Restore:PembimbingUniversitas');
    }

    public function forceDelete(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('ForceDelete:PembimbingUniversitas');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PembimbingUniversitas');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PembimbingUniversitas');
    }

    public function replicate(AuthUser $authUser, PembimbingUniversitas $pembimbingUniversitas): bool
    {
        return $authUser->can('Replicate:PembimbingUniversitas');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PembimbingUniversitas');
    }

}