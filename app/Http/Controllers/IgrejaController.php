<?php

namespace App\Http\Controllers;

use App\Models\Igreja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IgrejaController extends Controller
{
    public function index()
    {
        $igrejas = Igreja::all();
        return view('igreja.index', compact('igrejas')); // Agora a view está diretamente na pasta resources/views
    }

    public function create()
    {
        return view('igreja.create'); // Mesma coisa aqui
    }

    // Método para buscar o endereço pelo CEP
    public function buscarEnderecoPorCep(Request $request)
    {
        $cep = $request->cep;
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        return response()->json($response->json());
    }

    // Método para armazenar a igreja no banco
    public function store(Request $request)
    {
        $cep = str_replace('-', '', $request->cep); // Remove o traço do CEP
        $request->validate([
            'nome' => 'required|string|max:255',
            'cep' => 'required|string|max:8',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
        ]);

        Igreja::create([
            'nome' => $request->nome,
            'cep' => $cep, // Armazena o CEP sem o '-'
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'numero' => $request->numero,
        ]);

        return redirect()->route('igreja.index');
    }

    public function edit(Igreja $igreja){
        return view('igreja.edit', compact('igreja'));
    }

    public function update(Request $request, $id)
    {

        $igreja = Igreja::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'cep' => 'required|string|max:8',
            'logradouro' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
        ]);

        $igreja->update($request->all());

        // Adiciona mensagem de sucesso
        return redirect()->route('igreja.index')->with('success', 'Igreja atualizada com sucesso!');
    }


}
