<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::with('events')->latest()->get();
        // dd($users);
        return view('Backend.modules.users.index',compact('users'));
    }

    

    public function show($id)
    {
        $users = User::with(['events'])->find($id);
        // $events = Event::all();
        // $user = User::all();
        // dd($event);
        return view('Backend.modules.users.show',compact('users'));
    }

    

}
