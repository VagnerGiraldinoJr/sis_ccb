<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Exibe todos os eventos
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Exibe o formulário de criação de evento
    public function create()
    {
        return view('events.create');
    }

    // Salva um novo evento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
        ]);

        Event::create($validated);


        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    // Exibe os detalhes do evento
    public function show(Event $event)
    {
        $attendees = $event->attendees()->distinct()->get();
        return view('events.show', compact('event', 'attendees'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {
        return redirect()->route('event.attendances.manage', ['event' => $id]);
    }
}
