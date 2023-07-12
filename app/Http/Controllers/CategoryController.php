<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('Backend.modules.category.index',compact('categories'));
    }

    public function create()
    {
        return view('Backend.modules.category.create');
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
            'name'=>'required|max:10|min:2|string',
            
            // 'user_id'=>'required',
            ],

            $message=[
                'name.required' => 'Please write a category name.',
                
            ]
        );



        Category::create($request->all());
        session()->flash('msg','Category Created Successfully');
        session()->flash('cls','success');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category = Category::find($id);
        return view('Backend.modules.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $this->validate($request,[
            'name'=>'required|max:10|min:2|string',
            
            // 'user_id'=>'required',
            ],

            $message=[
                'name.required' => 'Please write a category name.',
                
            ]
        );


        $category->update($request->all());
        session()->flash('msg','Category name Updated Successfully');
        session()->flash('cls','success');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('msg','Category Deleted Successfully');
        session()->flash('cls','danger');
        return redirect()->route('category.index');
    }
    
}
