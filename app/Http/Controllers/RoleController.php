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
}
