<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Agenda;


class AgendaController extends Controller
{
    public function getEventList()
    {
        $events = Event::all(); // Fetch all events
        return view('agenda.index', ['events' => $events]); // Pass events to the view
    }

    public function getAgendaForEvent(Request $request)
    {
        $agenda = Agenda::where('event_id', $request->id)->get();
        return view('agenda.view', ['agenda' => $agenda]); // Pass events to the view
    }

    public function getAgendaToEdit(Request $request)
    {
        $agenda = Agenda::find($request->id);
        return view('agenda.edit', ['agenda' => $agenda]); // Pass events to the view
    }

    public function edit(Request $request, Agenda $agenda)
    {
        Agenda::find($request->agendaId)->update($request->all());
        return redirect()->route('agenda');
    }

    public function delete(Request $request)
    {
        echo 'dam delete';
        echo $request->id;
        Agenda::find($request->id)->delete();
        return redirect()->route('agenda');
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);
//
//        // Create and save the new agenda item
        $agenda = new Agenda();
        $agenda->event_id = $event->id;
        $agenda->title = $request->title;
        $agenda->description = $request->description;
        $agenda->start_time = $request->startDate;
        $agenda->end_time = $request->endDate;

        $agenda->save();

        // Redirect to a specific view or route, for example, back to the event's agenda
        return redirect()->route('agenda.show', ['id' => $event->id]);
    }
}
