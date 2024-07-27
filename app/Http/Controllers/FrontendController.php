<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Frontend.modules.home');
    }

    public function blog()
    {
        $pageSubTitle = 'Posts';
        $pageTitle = 'View All Posts';
        $posts = Post::where('status', 1)->where('is_approved', 1)->latest()->paginate(5);
        return view('Frontend.modules.blog.blog', compact('posts', 'pageSubTitle', 'pageTitle'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $pageSubTitle = $search;
        $pageTitle = 'Search';
        $posts = Post::with('tags', 'category', 'sub_category', 'user')
            ->where('status', 1)
            ->where('is_approved', 1)
            ->where('title', 'like', '%' . $search . '%')
            ->latest()
            ->paginate(5);
        return view('Frontend.modules.blog.blog', compact('posts', 'search', 'pageSubTitle', 'pageTitle'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $pageSubTitle = $category->name;
        $pageTitle = 'Posts By Category';
        $posts = Post::with('tags', 'category', 'sub_category', 'user')
            ->where('status', 1)
            ->where('is_approved', 1)
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(5);
        return view('Frontend.modules.blog.blog', compact('posts', 'pageSubTitle', 'pageTitle'));
    }

    public function subCategory($cat_slug, $sub_cat_slug)
    {
        $subCategory = SubCategory::where('slug', $sub_cat_slug)->firstOrFail();
        $pageSubTitle = $subCategory->name;
        $pageTitle = 'Posts By Sub Category';
        $posts = Post::with('tags', 'category', 'sub_category', 'user')
            ->where('status', 1)
            ->where('is_approved', 1)
            ->where('sub_category_id', $subCategory->id)
            ->latest()
            ->paginate(5);
        return view('Frontend.modules.blog.blog', compact('posts', 'pageSubTitle', 'pageTitle'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $pageSubTitle = $tag->name;
        $pageTitle = 'Posts By Tag';
        $post_ids = DB::table('post_tag')->where('tag_id', $tag->id)->distinct('post_id')->pluck('post_id');
        $posts = Post::with('tags', 'category', 'sub_category', 'user')
            ->where('status', 1)
            ->where('is_approved', 1)
            ->whereIn('id', $post_ids)
            ->latest()
            ->paginate(5);
        return view('Frontend.modules.blog.blog', compact('posts', 'pageSubTitle', 'pageTitle'));
    }


    public function singleBlog($slug)
    {
        $post = Post::with('tags', 'category', 'sub_category', 'user','comments','comments.user','comments.replay')->where('status', 1)->where('is_approved', 1)->where('slug', $slug)->firstOrFail();
        return view('Frontend.modules.blog.single_blog', compact('post'));
    }

    public function portfolioDetails()
    {
        return view('Frontend.modules.portfolio-details');
    }
}
