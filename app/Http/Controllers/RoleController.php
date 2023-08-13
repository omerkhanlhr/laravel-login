<?php

namespace App\Http\Controllers;

use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function Allpermission()
    {
        $roles=Permission::all();
        return view('backend.pages.permissions.all_permissions',compact('roles'));
    }

    public function Addpermission()
    {
        return view('backend.pages.permissions.add_permissions');
    }

    public function Savepermission(Request $req)
    {
        $permission = Permission::create([
            'name' => $req->name,
            'group_name'=> $req->group_name
        ]);
        $notification=array(
            'message'=>'Permission Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.permission')->with($notification);

    }

    public function Deletepermission($id)
   {
        Permission::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Permission Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
   }

   public function Editpermission($id)
   {
    $data=Permission::find($id);
    return view('backend.pages.permissions.edit_permission',compact('data'));
   }

   public function Updatepermission(Request $req)
   {
        $id=$req->id;


        //  print_r($req->all());

        $update= Permission::findOrFail($id)->update([
            'name' => $req->name,
            'group_name'=> $req->group_name
        ]);

        $notification=array(
            'message'=>'Permission Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.permission')->with($notification);
   }
   public function Importpermission()
   {
    return view('backend.pages.permissions.import_permission');
   }

   public function Exportpermission()
   {
        return Excel::download(new PermissionExport,'permission.xlsx');
   }
   public function Import(Request $req)
   {
    Excel::import(new PermissionImport,$req->file('import_file'));

    $notification=array(
        'message'=>'Permission Imported Successfully',
        'alert-type'=>'success'
    );

    return redirect()->back()->with($notification);
   }

// ----------------------------------------------------------------------------------------

   public function Allrole()
    {
        $roles=Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }

    public function Addrole()
    {
        return view('backend.pages.roles.add_roles');
    }

    public function Saverole(Request $req)
    {
        $permission = Role::create([
            'name' => $req->name
        ]);
        $notification=array(
            'message'=>'Role Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.role')->with($notification);
    }

    public function Deleterole($id)
    {
         Role::findOrFail($id)->delete();
         $notification=array(
             'message'=>'Role Deleted Successfully',
             'alert-type'=>'success'
         );
         return back()->with($notification);
    }

    public function Editrole($id)
    {
     $data=Role::find($id);
     return view('backend.pages.roles.edit_roles',compact('data'));
    }

    public function Updaterole(Request $req)
    {
         $id=$req->id;


         //  print_r($req->all());

         $update= Role::findOrFail($id)->update([
             'name' => $req->name
         ]);

         $notification=array(
             'message'=>'Role Updated Successfully',
             'alert-type'=>'success'
         );

         return redirect()->route('all.role')->with($notification);
    }

    public function AddRolesPermission()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        $permissions_groups=User::getpermissionGroup();
        return view('backend.pages.role_setup.add_roles_permission',compact('roles','permissions','permissions_groups'));
    }

    public function RolePermissionStore(Request $req)
    {
        $data=array();
        $permission=$req->permission;
        foreach($permission as $kry=>$item)
        {
            $data['role_id']=$req->role_id;
            $data['permission_id']=$item;
            DB::table('role_has_permissions')->insert($data);
            $notification=array(
                'message'=>'Role Permission Added Successfully',
                'alert-type'=>'success'
            );

            return redirect()->route('all_permission_roles')->with($notification);

        }
    }

    public function AllRolesPermission()
    {
       $roles= Role::all();
       return view('backend.pages.role_setup.all_roles_permission',compact('roles'));
    }

    public function Editpermissionrole($id)
    {
        $role=Role::findOrFail($id);
        $permissions=Permission::all();
        $permissions_groups=User::getpermissionGroup();
        return view('backend.pages.role_setup.edit_roles_permission',compact('role','permissions','permissions_groups'));
    }

    public function Deletepermissionrole($id)
    {
        $role=Role::findOrFail($id);
        if(!is_null($role))
        {
            $role->delete();
        }
        $notification=array(
            'message'=>'Role Permission Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all_permission_roles')->with($notification);

    }

    public function UpdateRolePermission(Request $req)
    {
        $id=$req->id;
        $role=Role::findOrFail($id);
        $permissions=$req->permission;
        if(!empty($permissions))
        {
            $role->syncPermissions($permissions);
        }
        $notification=array(
            'message'=>'Role Permission Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all_permission_roles')->with($notification);

    }
}
