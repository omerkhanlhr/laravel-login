<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function Allpermission()
    {
        $roles=Permission::all();
        return view('backend.pages.permissions.all_permissions',compact('roles'));
    }
}
