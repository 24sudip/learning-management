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

    public function StoreBlogPost(Request $request) {
        if ($request->file('post_image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(370,247);
            $img->toJpeg(80)->save(base_path('public/upload/post/'. $name_gen));
            $save_url = 'upload/post/'. $name_gen;
            BlogPost::insert([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
                'post_image' => $save_url,
                'long_description' => $request->long_description,
                'post_tags' => $request->post_tags,
                'created_at' => now()
            ]);
        }
        $notification = array(
            'message' => 'BlogPost Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.post')->with($notification);
    }

    public function EditBlogPost($id) {
        $blog_categories = BlogCategory::latest()->get();
        $blog_post = BlogPost::find($id);
        return view('admin.backend.post.edit-post', compact('blog_post','blog_categories'));
    }

    public function UpdateBlogPost(Request $request, $id) {
        if ($request->file('post_image')) {
            @unlink(public_path(BlogPost::find($id)->post_image));

            $manager = new ImageManager(new Driver());
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(370,247);
            $img->toJpeg(80)->save(base_path('public/upload/post/'. $name_gen));
            $save_url = 'upload/post/'. $name_gen;
            BlogPost::find($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
                'post_image' => $save_url,
                'long_description' => $request->long_description,
                'post_tags' => $request->post_tags,
            ]);
            $notification = array(
                'message' => 'BlogPost Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.post')->with($notification);
        } else {
            BlogPost::find($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-', $request->post_title)),
                'long_description' => $request->long_description,
                'post_tags' => $request->post_tags,
            ]);
            $notification = array(
                'message' => 'BlogPost Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.post')->with($notification);
        }
    }

    public function DeleteBlogPost($id) {
        $item = BlogPost::find($id);
        $img = $item->post_image;
        unlink($img);
        $item->delete();
        $notification = array(
            'message' => 'BlogPost Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogDetails($slug) {
        $blog_post = BlogPost::where('post_slug', $slug)->first();
        $post_tags = $blog_post->post_tags;
        $tags_all = explode(',', $post_tags);
        $blog_categories = BlogCategory::latest()->get();
        $recent_posts = BlogPost::latest()->limit(3)->get();
        return view('frontend.blog.blog-details', compact('blog_post','tags_all','blog_categories','recent_posts'));
    }
}
