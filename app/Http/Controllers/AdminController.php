<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function login()
    {
        return view('admin.admin_login');
    }
    public function profile()
    {
        $id= Auth::user()->id;
        $profile=User::find($id);
        return view('admin.admin_profile',compact('profile'));
    }

    public function update_profile(Request $req)
    {
        $id= Auth::user()->id;
        $data=User::find($id);
        $data->name=$req->name;
        $data->email=$req->email;
        if($req->file('photo'))
        {
            $file=$req->file('photo');
            @unlink(public_path('images/admin_images/'.$data->photo));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/admin_images'),$filename);
            $data['photo']=$filename;
        }
        $data->save();
        $notification=array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function change_password()
    {
        $id= Auth::user()->id;
        $profile=User::find($id);
        return view('admin.admin_change_password',compact('profile'));
    }

    public function update_password(Request $req)
    {
        $req->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed'
        ]);
        if(!Hash::check($req->old_password,auth::user()->password))
        {
            $notification=array(
                'message'=>'Old Password does not match',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($req->new_password)
        ]);
        $notification=array(
            'message'=>'Password Change Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function Alladmin()
    {
        $alladmin=User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',compact('alladmin'));
    }

    public function Addadmin()
    {
        $roles=Role::all();
        return view('backend.pages.admin.add_admin',compact('roles'));
    }

    public function Storeadmin(Request $req)
    {
        $user=new User();
        $user->name=$req['name'];
        $user->email=$req['email'];
        $user->password=Hash::make($req['password']);
        $user->role='admin';
        $user->save();
        if($req->role)
        {
            $user->assignRole($req->role);
        }
        $notification=array(
            'message'=>'Admin Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function Editadmin($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all();
        return view('backend.pages.admin.edit_admin',compact('user','roles'));
    }

    public function Updateadmin($id,Request $req)
    {
        $user=User::findOrFail($id);
        $user->name=$req['name'];
        $user->email=$req['email'];
        $user->password=Hash::make($req['password']);
        $user->role='admin';
        $user->save();
        $user->roles()->detach();
        if($req->role)
        {
            $user->assignRole($req->role);
        }
        $notification=array(
            'message'=>'Admin Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function Deleteadmin($id)
    {
        $user=User::findOrFail($id);
        if(!is_null($user))
        {
            $user->delete();
        }
        $notification=array(
            'message'=>'Admin Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
