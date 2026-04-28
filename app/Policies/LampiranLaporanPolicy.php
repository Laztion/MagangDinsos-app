<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\LampiranLaporan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LampiranLaporanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LampiranLaporan');
    }

    public function view(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('View:LampiranLaporan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LampiranLaporan');
    }

    public function update(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('Update:LampiranLaporan');
    }

    public function delete(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('Delete:LampiranLaporan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:LampiranLaporan');
    }

    public function restore(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('Restore:LampiranLaporan');
    }

    public function forceDelete(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('ForceDelete:LampiranLaporan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LampiranLaporan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LampiranLaporan');
    }

    public function replicate(AuthUser $authUser, LampiranLaporan $lampiranLaporan): bool
    {
        return $authUser->can('Replicate:LampiranLaporan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LampiranLaporan');
    }

}