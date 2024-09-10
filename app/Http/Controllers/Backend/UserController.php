<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                session()->flash('msg', 'Logged in Sucessfully.');
                session()->flash('cls', 'success');
                return redirect()->route('dashboard');
            } else {
                session()->flash('msg', 'Invalid username or password');
                session()->flash('cls', 'error');
                return redirect()->route('login');
            }
        }

        return view('auth.login');
    }

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => User::USER,
                'password' => bcrypt($request->password),
            ]);

            if (Auth::attempt($request->only('email', 'password'))) {
                session()->flash('msg', 'Logged in Sucessfully.');
                session()->flash('cls', 'success');
                return redirect()->route('dashboard');
            }
        }

        return view('auth.register');
    }



    public function index()
    {
        $users = User::with('events')->latest()->get();
        // dd($users);
        return view('Backend.modules.users.index', compact('users'));
    }



    public function show($id)
    {
        $users = User::with(['events'])->find($id);
        // $events = Event::all();
        // $user = User::all();
        // dd($event);
        return view('Backend.modules.users.show', compact('users'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
