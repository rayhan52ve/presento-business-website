<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategory::with('category')->orderBy('order_by')->get();
        return view('Backend.modules.sub_category.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('Backend.modules.sub_category.create',compact('categories'));
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
            'slug'=>'required|max:100|min:2|unique:sub_categories',
            'order_by'=>'required|numeric',
            'status'=>'required',
            'category_id'=>'required',
            
            ],

            $message=[
                'name.required' => 'Please write a category name.',
                'order_by.numeric' => 'Order By must be integer.',
                
            ]
        );


        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug'));
        SubCategory::create($sub_category_data);
        session()->flash('msg','Sub Category Created Successfully.');
        session()->flash('cls','success');
        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');
        return view('Backend.modules.sub_category.show',compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::get()->all();
        return view('Backend.modules.sub_category.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request,[
            'name'=>'required|max:100|min:2|string',
            'slug'=>'required|max:100|min:2|unique:sub_categories,slug,'.$subCategory->id,
            'order_by'=>'required|numeric',
            'status'=>'required',
            'category_id'=>'required',
            
            ],

            $message=[
                'name.required' => 'Please write a category name.',                
            ]
        );

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug'));
        $subCategory->update($sub_category_data);
        session()->flash('msg','Sub Category Updated Successfully.');
        session()->flash('cls','success');
        return redirect()->route('sub-category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('msg','Sub Category Deleted Successfully.');
        session()->flash('cls','success');
        return redirect()->route('sub-category.index');
    }
}
