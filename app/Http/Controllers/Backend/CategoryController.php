<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all-category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddCategory()
    {
        return view('admin.backend.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function StoreCategory(Request $request)
    {
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(370,246);
            $img->toJpeg(80)->save(base_path('public/upload/category/'. $name_gen));
            $save_url = 'upload/category/'. $name_gen;
            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
                'image' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdateCategory(Request $request, $id)
    {
        if ($request->file('image')) {
            @unlink(public_path(Category::find($id)->image));

            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(370,246);
            $img->toJpeg(80)->save(base_path('public/upload/category/'. $name_gen));
            $save_url = 'upload/category/'. $name_gen;

            Category::find($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Category Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            Category::find($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
            ]);
            $notification = array(
                'message' => 'Category Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DeleteCategory($id)
    {
        $category = Category::find($id);
        $img = $category->image;
        unlink($img);
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllSubCategory() {
        $sub_categories = SubCategory::latest()->get();
        return view('admin.backend.sub-category.all-sub-category', compact('sub_categories'));
    }

    public function AddSubCategory() {
        $categories = Category::latest()->get();
        return view('admin.backend.sub-category.add-sub-category', compact('categories'));
    }

    public function StoreSubCategory(Request $request) {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => strtolower(str_replace(' ','-', $request->sub_category_name)),
        ]);
        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id) {
        $categories = Category::latest()->get();
        $sub_category = SubCategory::find($id);
        return view('admin.backend.sub-category.edit-sub-category', compact('categories','sub_category'));
    }

    public function UpdateSubCategory(Request $request, $id) {
        SubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => strtolower(str_replace(' ','-', $request->sub_category_name)),
        ]);
        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id) {
        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
