<?php

namespace App\Http\Controllers;

use App\Models\Ammenities;
use Illuminate\Http\Request;

class AmmenitiesController extends Controller
{
    public function AllAmmenities()
   {
    $types=Ammenities::latest()->get();
    return view('backend.ammenities.all_type_ammenities',compact('types'));
   }

   public function AddAmmenitie()
   {
        return view('backend.ammenities.add_ammenties');
   }
   public function SaveAmmenitie(Request $req)
   {
        $req->validate([
            'ammenities_name'=>'required|max:200|unique:ammenities'
        ]);

        Ammenities::insert([
            'ammenities_name'=>$req->ammenities_name
        ]);
        $notification=array(
            'message'=>'Ammenitie Added Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('ammenities.type')->with($notification);
   }

   public function EditAmmenitie($id)
   {
    $data=Ammenities::find($id);
    return view('backend.ammenities.edit_ammenities',compact('data'));
   }

   public function UpdateAmmenitie(Request $req)
   {
        $id=$req->id;


        //  print_r($req->all());

        $update= Ammenities::findOrFail($id)->update([
        'ammenities_name'=>$req->ammenity
        ]);

        $notification=array(
            'message'=>'Ammenitie Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('ammenities.type')->with($notification);
   }

   public function DeleteAmmenitie($id)
   {
        Ammenities::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Ammenitie Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
   }
}
