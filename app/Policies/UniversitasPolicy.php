<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Universitas;
use Illuminate\Auth\Access\HandlesAuthorization;

class UniversitasPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Universitas');
    }

    public function view(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('View:Universitas');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Universitas');
    }

    public function update(AuthUser $authUser, Universitas $universitas): bool
    {
        return $authUser->can('Update:Universitas');
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