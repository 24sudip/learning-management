<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

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
}
