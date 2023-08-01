<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('order_by')->get();
        return view('Backend.modules.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.modules.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100|min:2|string',
            'slug'=>'required|max:100|min:2|unique:tags',
            'order_by'=>'required|numeric',
            'status'=>'required',
            
            ],

            $message=[
                'name.required' => 'Please write a tag name.',
                'order_by.numeric' => 'Order By must be integer.',
                
            ]
        );


        $tag_data = $request->all();
        $tag_data['slug'] = Str::slug($request->input('slug'));
        Tag::create($tag_data);
        session()->flash('msg','Tag Created Successfully.');
        session()->flash('cls','success');
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('Backend.modules.tag.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Backend.modules.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'name'=>'required|max:100|min:2|string',
            'slug'=>'required|max:100|min:2|unique:tags,slug,'.$tag->id,
            'order_by'=>'required|numeric',
            'status'=>'required',
            
            ],

            $message=[
                'name.required' => 'Please write a tag name.',                
            ]
        );

        $tag_data = $request->all();
        $tag_data['slug'] = Str::slug($request->input('slug'));
        $tag->update($tag_data);
        session()->flash('msg','Tag Updated Successfully.');
        session()->flash('cls','success');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('msg','Tag Deleted Successfully.');
        session()->flash('cls','success');
        return redirect()->back();
    }
}
