<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Frontend.modules.blog');
    }

    public function singleBlog()
    {
        return view('Frontend.modules.single_blog');
    }

    public function portfolioDetails()
    {
        return view('Frontend.modules.portfolio-details');
    }

    
}
