<?php

namespace App\Modules\Backoffice\Policies;

use App\Modules\Backoffice\Infrastructure\Database\Models\Admin;

class CategoryPolicy
{
    public function viewAny(Admin $admin): bool
    {
        return true;
    }

    public function create(Admin $admin): bool
    {
        return true;
    }
}
