<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventAttendance;
use App\Models\Person;

class EventAttendanceController extends Controller
{
    public function create(Event $event)
    {
        // Obter colaboradores disponíveis
        $people = Person::whereNotIn('id', $event->attendees->pluck('id'))->get();


        return view('event_attendance.create', compact('event', 'people'));
    }

    /**
     * Mostrar colaboradores do evento e formulário para adicionar novos.
     */
    public function manage(Event $event)
    {
        // Colaboradores já no evento
        $attendees = $event->attendees()->distinct()->get();
        // Todos os colaboradores disponíveis para adição
        $people = Person::whereNotIn('id', $attendees->pluck('id'))->get();

        return view('event_attendance.manage', compact('event', 'attendees', 'people'));
    }

    /**
     * Adicionar colaborador ao evento.
     */
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'person_id' => 'required|exists:people,id',
        ]);

        // Criando a presença do colaborador no evento
        EventAttendance::create([
            'event_id' => $event->id,
            'person_id' => $request->person_id,
            'check_in_time' => now(),  // Define o horário atual para check-in
        ]);

        $event->attendees()->attach($validated['person_id']);

        return redirect()->route('event.attendances.manage', $event->id)
            ->with('success', 'Colaborador adicionado com sucesso!');
    }

    /**
     * (Opcional) Remover colaborador do evento.
     */
    public function remove(Event $event, Person $person)
    {
        $event->attendees()->detach($person->id);

        return redirect()->route('event.attendances.manage', $event->id)
            ->with('success', 'Colaborador removido com sucesso!');
    }
}
