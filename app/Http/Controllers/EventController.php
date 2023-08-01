<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = Event::with('user')->get();
        // $user = User::all();
        // dd($events);
        return view('Backend.modules.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        return view('Backend.modules.event.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
    //     $request->validate([
    //         'title'=>'required|max:10|min:2|string',
    //         'description'=>'required|max:500|min:10|string',
    //         'start_date'=>'required',
    //         'end_date'=>'required',
    //         'priority'=>'required',
    //         'user_id'=>'required',
    //     ],
    //         $message=[
    //             'user_id.required' => 'Please select a user.',
    //             'priority.required' => 'Please select priority level.',
    //             'start_date.required' => 'Please select a Starting Date.',
    //             'end_date.required' => 'Please select Event Ending Date.',
    //         ]
    // );



        Event::create($request->all());
        session()->flash('msg','Event Created Successfully.');
        session()->flash('cls','success');
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $event = Event::with(['user'])->find($id);
        //dd($event->with(['user']));
        // dd($event);
        return view('Backend.modules.event.show',compact('event')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $users = User::pluck('name','id');
        // dd($users);
        return view('Backend.modules.event.edit',compact('event','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request,$id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        session()->flash('msg','Event Updated Successfully.');
        session()->flash('cls','success');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        session()->flash('delmsg','Event Deleted Successfully.');
        session()->flash('cls','success');
        return redirect()->route('event.index');
        // return back()->withInput();
    }
}
