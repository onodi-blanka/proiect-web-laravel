<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Event::orderBy('nume', 'ASC')->paginate(5);
        $value = ($request->input('page', 1) - 1) * 5;
        return view('events.list', compact('events'))->with('i', $value);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, ['nume' => 'required',
            'descriere' => 'required',
            'locatie' => 'required',
            'data' => 'required',
            'price' => 'required']);
        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Your event was added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['nume' => 'required',
            'descriere' => 'required',
            'locatie' => 'required',
            'data' => 'required',
            'price' => 'required']);
        Event::find($id)->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success', 'Event removed successfully!');
    }
}
