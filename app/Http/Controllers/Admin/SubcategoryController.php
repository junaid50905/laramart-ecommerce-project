<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    //index
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('categories', 'subcategories'));
    }
    //store
    public function store(SubcategoryRequest $request)
    {
        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-')
        ]);
        return redirect()->route('subcategory.index')->with('success', 'Subcategory added successfully');
    }
    //destroy
    public function destroy($id)
    {
        Subcategory::destroy($id);
        return redirect()->route('subcategory.index')->with('destroy', 'Subcategory has been deleted');
    }
    //edit
    public function edit($id)
    {
        $edit_subcategory = Subcategory::find($id);
        return response()->json($edit_subcategory);
    }
    public function update(SubcategoryRequest $request)
    {
        Subcategory::where('id', $request->id)
                ->update([
                    'category_id' => $request->category_id,
                    'subcategory_name' => $request->subcategory_name,
                    'subcategory_slug' => Str::slug($request->subcategory_name, '-')
                ]);
        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully');
    }
}
