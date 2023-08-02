<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\controller;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.dashboard');
    }

    public function profile()
    {
        return view('Backend.modules.profile.profile');
    }
}
