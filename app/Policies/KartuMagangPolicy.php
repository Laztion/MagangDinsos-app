<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KartuMagang;
use Illuminate\Auth\Access\HandlesAuthorization;

class KartuMagangPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KartuMagang');
    }

    public function view(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('View:KartuMagang');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KartuMagang');
    }

    public function update(AuthUser $authUser, KartuMagang $kartuMagang): bool
    {
        return $authUser->can('Update:KartuMagang');
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

}