<?php

namespace App\Modules\Backoffice\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function createRole(Request $request)
    {
        $name = $request->validated()['name'];
        return Role::create([
          'name' => $name,
          'guard_name' => 'admin'
        ]);
    }
}