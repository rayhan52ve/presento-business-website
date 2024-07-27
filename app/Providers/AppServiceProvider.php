<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $categories = Category::with('sub_categories')->where('status',1)->orderBy('order_by','asc')->get();
        $tags = Tag::where('status',1)->orderBy('order_by','asc')->get();
        $recentPosts = Post::where('status',1)->where('is_approved',1)->latest()->take(5)->get();
        view()->share(['categories'=>$categories, 'tags'=>$tags, 'recentPosts'=>$recentPosts]);
    }
}
