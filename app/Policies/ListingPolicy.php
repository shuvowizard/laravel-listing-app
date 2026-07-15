<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{
    public function view(?User $user, Listing $listing): bool
    {
        return $listing->user->role !== 'suspended' && $listing->approved === true;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function Delete(User $user, Listing $listing): bool
    {
        return false;
    }
}
