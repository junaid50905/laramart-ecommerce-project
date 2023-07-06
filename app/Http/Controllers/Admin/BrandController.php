<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    //index
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.brand.index', compact('brands'));
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_img' => 'required',
        ]);

        if($request->hasFile('brand_img')){
            $image = $this->uploadImage($request->brand_img, $request->brand_name);
        }
        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_img' => $image,
            'front_page' => 1
        ]);
        return redirect()->route('brand.index')->with('success', 'successfully added new brand');
    }
    //destroy
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('brand.index')->with('destroy', 'a brand has been deleted');
    }
    //edit
    public function edit($id)
    {
        $data = Brand::find($id);
        return view('admin.brand.edit', compact('data'));
    }
    //update
    public function update(Request $request, $id)
    {
        $previoue_img = Brand::where('id', $id)->first()->brand_img;
        $request->validate([
            'brand_name' => 'required',
        ]);
        if ($request->hasFile('brand_img')) {
            $image = $this->uploadImage($request->brand_img, $request->brand_name);
            Brand::where('id', $id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => Str::slug($request->brand_name, '-'),
                'brand_img' => $image,
                'front_page' => 1
            ]);
            return redirect()->route('brand.index')->with('success', 'successfully added new brand');
        }else{
            Brand::where('id', $id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => Str::slug($request->brand_name, '-'),
                'brand_img' => $previoue_img,
                'front_page' => 1
            ]);
            return redirect()->route('brand.index')->with('success', 'successfully added new brand');
        }

    }


    //upload image function
    public function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $filename = $timestamp.'-'.$title.'.'.$file->getClientOriginalExtension();

        $pathToUpload = storage_path().'/app/public/files/brand_images/';

        if (! is_dir($pathToUpload)) {
            mkdir($pathToUpload, 0755, true);
        }
        Image::make($file)->resize(320, 240)->save($pathToUpload.$filename);
        return $filename;
    }

}
