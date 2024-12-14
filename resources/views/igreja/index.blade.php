<!-- resources/views/admin/igrejas/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Igrejas</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($igrejas as $igreja)
                        <tr>
                            <td>{{ $igreja->nome }}</td>
                            <td>{{ $igreja->logradouro }}, {{ $igreja->numero }}, {{ $igreja->bairro }}
                                , {{ $igreja->cidade }} - {{ $igreja->estado }}</td>
                            <td>
                                <a href="{{ route('igreja.edit', $igreja->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Adicione ações como deletar, ver detalhes, etc. -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
