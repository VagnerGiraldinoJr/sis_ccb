@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Adicionar Colaboradores ao Evento: {{ $event->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('event.attendances.store', $event->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="person_id">Colaboradores:</label>
                        <select name="person_id" id="person_id" class="form-control" required>
                            @foreach($people as $person)
                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection