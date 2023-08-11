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
}
