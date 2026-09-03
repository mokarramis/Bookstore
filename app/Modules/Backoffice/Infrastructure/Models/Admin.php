<?php

namespace App\Modules\Backoffice\Infrastructure\Database\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasRoles; // admin has roles of admin, super-admin, maybe author, narrator, publisher, translator
    protected $guard_name = 'admin';

    protected $guarded = ['id'];
}
