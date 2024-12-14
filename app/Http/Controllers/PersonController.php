<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:people,email',
            'type' => 'required|in:administrador,cooperador,ancião,diácono',
            'address' => 'required|string',
            'congregation' => 'required|string|max:255',
        ]);

        Person::create($validated);

        return redirect()->route('people.index')->with('success', 'Registro criado com sucesso!');
    }

    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:people,email,' . $person->id,
            'type' => 'required|in:administrador,cooperador,ancião,diácono',
            'address' => 'required|string',
            'congregation' => 'required|string|max:255',
        ]);

        $person->update($validated);

        return redirect()->route('people.index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('people.index')->with('success', 'Registro excluído com sucesso!');
    }
}
