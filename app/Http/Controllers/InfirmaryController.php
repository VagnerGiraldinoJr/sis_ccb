<?php

namespace App\Http\Controllers;

use App\Models\InfirmaryEntry;
use App\Models\Person;
use Illuminate\Http\Request;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;


class InfirmaryController extends Controller
{
    public function create($person_id)
    {
        $person = Person::findOrFail($person_id);
        return view('infirmary.create', compact('person'));
    }

    public function store(Request $request, $person_id)
    {
        $request->validate([
            'temperature' => 'required|numeric',
            'height' => 'required|numeric',
            'takes_medication' => 'required|boolean',
            'medication' => 'nullable|string',
            'has_allergies' => 'required|boolean',
            'allergies' => 'nullable|string',
            'observations' => 'required|string|max:300',
        ]);

        $person = Person::findOrFail($person_id);
        $person->infirmaryEntries()->create($request->all());

        return redirect()->route('infirmary.index', $person_id)->with('success', 'Prontuário criado com sucesso!');
    }

    public function index($person_id)
    {
        $person = Person::with(['infirmaryEntries' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($person_id);
        return view('infirmary.index', compact('person'));
    }

    public function show($id)
    {
        $entry = InfirmaryEntry::findOrFail($id);
        return view('infirmary.show', compact('entry'));
    }

    public function select()
    {
        $people = Person::withCount('infirmaryEntries')->get();
        
        return view('infirmary.select-person', compact('people'));
    }

    public function edit($id)
    {
        $entry = InfirmaryEntry::findOrFail($id);
        return ('Edit nao implantado');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'temperature' => 'required|numeric',
            'height' => 'required|numeric',
            'takes_medication' => 'required|boolean',
            'medication' => 'nullable|string',
            'has_allergies' => 'required|boolean',
            'allergies' => 'nullable|string',
            'observations' => 'required|string|max:300',
        ]);

        $entry = InfirmaryEntry::findOrFail($id);
        $entry->update($request->all());

        return redirect()->route('infirmary.index', ['person' => $entry->person_id])->with('success', 'Prontuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        return ('Destroy nao implantado');
    }
}
