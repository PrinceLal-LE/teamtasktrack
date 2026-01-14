<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;

class DocumentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_document');
    }

    public function view(User $user, Document $document): bool
    {
        return $user->can('view_document');
    }

    public function create(User $user): bool
    {
        return $user->can('create_document');
    }

    public function delete(User $user, Document $document): bool
    {
        return $user->can('delete_document');
    }
}
