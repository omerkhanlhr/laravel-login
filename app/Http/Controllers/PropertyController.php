<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
   public function AllType()
   {
    $types=Property::latest()->get();
    return view('backend.type.all_type',compact('types'));
   }
   public function AddProperty()
   {
        return view('backend.type.add_type');
   }
   public function SaveProperty(Request $req)
   {
        $req->validate([
            'type_name'=>'required|max:200|unique:properties',
            'type_icon'=>'required'
        ]);

        Property::insert([
            'type_name'=>$req->type_name,
            'type_icon'=>$req->type_icon
        ]);
        $notification=array(
            'message'=>'Property Added Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.type')->with($notification);
   }

   public function EditProperty($id)
   {
    $data=Property::find($id);
    return view('backend.type.edit_type',compact('data'));
   }

   public function UpdateProperty(Request $req)
   {
        $id=$req->id;
    //  print_r($req->all());
        $req->validate([
            'type_name'=>'required|max:200|unique:properties',
            'type_icon'=>'required'
        ]);
       Property::findOrFail($id)->update([
            'type_name'=>$req->type_name,
            'type_icon'=>$req->type_icon
        ]);

        $notification=array(
            'message'=>'Property Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('all.type')->with($notification);
   }

   public function DeleteProperty($id)
   {
        Property::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Property Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
   }
   }

