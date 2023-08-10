<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
