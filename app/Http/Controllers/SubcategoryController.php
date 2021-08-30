<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategories.index', compact('subcategories'));
    }
    public function create()
    {
        return view('admin.subcategories.create');
    }
    public function store(Request $request, Subcategory $subcategory)
    {
        $subcategory->my_store($request);
        return redirect()->route('subcategories.index');
    }
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategories'));
    }
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategories'));
    }
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->my_update($request);
        return redirect()->route('subcategories.index');
    }
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index');
    }
}
