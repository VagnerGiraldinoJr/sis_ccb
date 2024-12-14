@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Novo Evento</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="start_datetime">Data de Início:</label>
                        <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_datetime">Data de Fim:</label>
                        <input type="datetime-local" name="end_datetime" id="end_datetime" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection