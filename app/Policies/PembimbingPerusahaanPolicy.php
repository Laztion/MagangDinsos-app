<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PembimbingPerusahaan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembimbingPerusahaanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PembimbingPerusahaan');
    }

    public function view(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('View:PembimbingPerusahaan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PembimbingPerusahaan');
    }

    public function update(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('Update:PembimbingPerusahaan');
    }

    public function delete(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('Delete:PembimbingPerusahaan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:PembimbingPerusahaan');
    }

    public function restore(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('Restore:PembimbingPerusahaan');
    }

    public function forceDelete(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('ForceDelete:PembimbingPerusahaan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PembimbingPerusahaan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PembimbingPerusahaan');
    }

    public function replicate(AuthUser $authUser, PembimbingPerusahaan $pembimbingPerusahaan): bool
    {
        return $authUser->can('Replicate:PembimbingPerusahaan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PembimbingPerusahaan');
    }

}