<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PhotoUploadController;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'sub_category', 'user', 'tags')->latest()->paginate(20);
        return view('Backend.modules.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        return view('Backend.modules.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post_data = $request->except('slug', 'photo', 'tag_ids');
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = 'uploads/post/original/';
            $thumb_path = 'uploads/post/thumbnail/';

            $post_data['photo'] = PhotoUploadController::imageUpload($name, $path, $file);
            // PhotoUploadController::imageUpload($name, $thumb_path, $file);
        }
        $post = Post::create($post_data);
        $post->tags()->attach($request->input('tag_ids'));

        session()->flash('msg', 'Post Created Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('category', 'sub_category', 'user', 'tags');
        return view('Backend.modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post->load('category', 'sub_category', 'user', 'tags');
        $categories = Category::where('status', 1)->get();
        $subCategories = SubCategory::where('status', 1)->get();
        $tags = Tag::where('status', 1)->get();
        $selected_tags = DB::table('post_tag')->where('post_id', $post->id)->pluck('tag_id')->toArray();
        // $selected_tags = $post->tags->pluck('id')->toArray();
        return view('Backend.modules.post.edit', compact('post', 'categories', 'subCategories', 'tags', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        // dd($request->all());
        $post_data = $request->except('slug', 'photo', 'tag_ids');
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = 'uploads/post/original/';
            $thumb_path = 'uploads/post/thumbnail/';

            PhotoUploadController::imageUnlink($path, $post->photo);
            // PhotoUploadController::imageUnlink($thumb_path,$post->photo);

            $post_data['photo'] = PhotoUploadController::imageUpload($name, $path, $file);
            // PhotoUploadController::imageUpload($name, $thumb_path, $file);
        }
        $post->update($post_data);
        $post->tags()->sync($request->input('tag_ids'));

        session()->flash('msg', 'Post Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $path = 'uploads/post/original/';
        PhotoUploadController::imageUnlink($path, $post->photo);
        
        $post->delete();
        session()->flash('msg', 'Post Deleted Successfully');
        session()->flash('cls', 'success');
        return redirect()->back();
    }
}
