<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\RiwayatMagang;
use Illuminate\Auth\Access\HandlesAuthorization;

class RiwayatMagangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:RiwayatMagang');
    }

    public function view(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('View:RiwayatMagang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:RiwayatMagang');
    }

    public function update(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('Update:RiwayatMagang');
    }

    public function delete(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('Delete:RiwayatMagang');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:RiwayatMagang');
    }

    public function restore(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('Restore:RiwayatMagang');
    }

    public function forceDelete(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('ForceDelete:RiwayatMagang');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:RiwayatMagang');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:RiwayatMagang');
    }

    public function replicate(AuthUser $authUser, RiwayatMagang $riwayatMagang): bool
    {
        return $authUser->can('Replicate:RiwayatMagang');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:RiwayatMagang');
    }

}