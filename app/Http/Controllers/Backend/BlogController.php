<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BlogCategory, BlogPost};
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    public function AllBlogCategory() {
        $blog_categories = BlogCategory::latest()->get();
        return view('admin.backend.blog-category.all-blog-category', compact('blog_categories'));
    }

    public function StoreBlogCategory(Request $request) {
        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
        ]);
        $notification = array(
            'message' => 'BlogCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function EditBlogCategory($id) {
        $blog_category = BlogCategory::find($id);
        return response()->json($blog_category);
    }

    public function UpdateBlogCategory(Request $request) {
        $cat_id = $request->cat_id;
        BlogCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-', $request->category_name)),
        ]);
        $notification = array(
            'message' => 'BlogCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteBlogCategory($id) {
        BlogCategory::find($id)->delete();
        $notification = array(
            'message' => 'BlogCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllBlogPost() {
        $blog_posts = BlogPost::latest()->get();
        return view('admin.backend.post.all-post', compact('blog_posts'));
    }

    public function AddBlogPost() {
        $blog_categories = BlogCategory::latest()->get();
        return view('admin.backend.post.add-post', compact('blog_categories'));
    }
}
