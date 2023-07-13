<?php

namespace App\Http\Controllers\Admin\product;

use App\Http\Controllers\Controller;
use App\Models\AllProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\PickupPoint;
use App\Models\Subcategory;
use App\Models\TempImage;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //index
    public function index()
    {
        $products = AllProduct::all();
        return view('admin.product.index', compact('products'));
    }
    //create
    public function create()
    {
        $categories = Category::all();
        $childcategories = Childcategory::all();
        $brands = Brand::all();
        $pick_up_points = PickupPoint::all();
        $warehouses = Warehouse::all();
        return view('admin.product.create', compact('brands', 'childcategories', 'pick_up_points', 'warehouses', 'categories'));
    }
    //store
    public function store(Request $request)
    {
        $is_featured = $request->has('featured') ? 1 : 0;
        $is_today_deal = $request->has('today_deal') ? 1 : 0;
        $is_status = $request->has('status') ? 1 : 0;
        $is_cash_on_delivery = $request->has('cash_on_delivery') ? 1 : 0;


        $thumbnail = $request->file('thumbnail');
        $thumbnail_name = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('assets/images/product-images/thumbnail'), $thumbnail_name);


        // Create a new product
        $product = new AllProduct;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->pickup_point_id = $request->pickup_point_id;
        $product->warehouse_id = $request->warehouse_id;
        $product->admin_id = Auth::user()->id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->unit = $request->unit;
        $product->tags = $request->tags;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->video = $request->video;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->thumbnail = $thumbnail_name;
        $product->featured = $is_featured;
        $product->today_deal = $is_today_deal;
        $product->status = $is_status;
        $product->cash_on_delivery = $is_cash_on_delivery;
        $product->save();

        //multiple image insert
        $multiple_images = $request->image;
        foreach ($multiple_images as $single_image) {
            $single_image_name = uniqid() . '.' . $single_image->getClientOriginalExtension();
            $single_image->move(public_path('assets/images/product-images/multiple-images'), $single_image_name);

            $temporary_image = new TempImage;
            $temporary_image->product_id = $product->id;
            $temporary_image->image = $single_image_name;
            $temporary_image->save();
        }

        return redirect()->route('add_product.index')->with('success', 'product added successfully');

    }
    //show
    public function show($id)
    {
        $product = AllProduct::where('id', $id)->first();
        return view('admin.product.show', compact('product'));
    }
    //destroy
    public function destroy($id)
    {
        $thumbnail = AllProduct::where('id', $id)->first()->thumbnail;
        $multiple_images = TempImage::where('product_id', $id)->get();

        AllProduct::destroy($id);
        unlink(public_path('assets/images/product-images/thumbnail/') . $thumbnail);
        foreach ($multiple_images as $image) {
            $image_path = public_path('assets/images/product-images/multiple-images/') . $image->image;
            if (file_exists($image_path)) {
                // Unlink the image file
                unlink($image_path);
            }
        }
        return redirect()->route('add_product.index')->with('destroy', 'Product has been deleted');
    }
    //edit
    public function edit($id)
    {
        $product = AllProduct::where('id', $id)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $pick_up_points = PickupPoint::all();
        $warehouses = Warehouse::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'pick_up_points', 'warehouses'));
    }

    //destroyThumbnail
    public function destroyThumbnail($id)
    {
        $image_name = TempImage::where('id', $id)->first()->image;

        TempImage::destroy($id);
        unlink(public_path('assets/images/product-images/multiple-images/') . $image_name);

        return redirect()->back()->with('destroy', 'an image has been deleted from multiple image of this product');
    }

    //fetch-subcategory
    public function fetchSubcategory($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }
    //fetch-childcategory
    public function fetchChildcategory($id)
    {
        $chldcategories = Childcategory::where('subcategory_id', $id)->get();
        return response()->json($chldcategories);
    }


    //fetch-updated-subcategory
    public function fetchUpdatedSubcategory($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }
    //fetch-updated-childcategory
    public function fetchUpdatedChildcategory($id)
    {
        $chldcategories = Childcategory::where('subcategory_id', $id)->get();
        return response()->json($chldcategories);
    }
}
