<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request){
        if ($request->ajax()) {
            $subcategories = Subcategory::where('category_id',
            $request->category)->get();
            return response()->json($subcategories);
        }
    }
}
