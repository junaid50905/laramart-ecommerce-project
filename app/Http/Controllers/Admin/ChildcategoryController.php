<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    //index
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $childcategories = Childcategory::orderBy('id', 'DESC')->get();;
        return view('admin.childcategory.index', compact('categories', 'subcategories', 'childcategories'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'childcategory_name' => 'required',
        ]);
        $category_id = Subcategory::where('id', $request->subcategory_id)->first()->category_id;
        Childcategory::create([
            'category_id' => $category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-')
        ]);
        return redirect()->route('childcategory.index')->with('success', 'Successfully added child category');
    }
    //destroy
    public function destroy($id)
    {
        Childcategory::destroy($id);
        return redirect()->route('childcategory.index')->with('destroy', 'childcategory has been deleted');
    }
    //edit
    public function edit($id)
    {

        $edit_childcategory_data = Childcategory::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.childcategory.edit', compact('edit_childcategory_data', 'categories', 'subcategories'));

    }
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory_id' => 'required',
            'childcategory_name' => 'required',
        ]);
        $category_id = Subcategory::where('id', $request->subcategory_id)->first()->category_id;
        Childcategory::where('id', $id)->update([
            'category_id' => $category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-')
        ]);
        return redirect()->route('childcategory.index')->with('success', 'Successfully updated');
    }
}
