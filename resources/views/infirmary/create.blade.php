@extends('admin.layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Criar Prontuário para {{ $person->name }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('infirmary.store', $person->id) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="temperature" class="col-md-4 col-form-label text-md-right">{{ __('Temperatura') }}</label>
                        <div class="col-md-6">
                            <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="temperature" required>
                            @error('temperature')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Altura') }}</label>
                        <div class="col-md-6">
                            <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" required>
                            @error('height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="takes_medication" class="col-md-4 col-form-label text-md-right">{{ __('Toma Medicamento Regularmente?') }}</label>
                        <div class="col-md-6">
                            <select id="takes_medication" class="form-control @error('takes_medication') is-invalid @enderror" name="takes_medication" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            @error('takes_medication')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="medication" class="col-md-4 col-form-label text-md-right">{{ __('Qual Medicamento?') }}</label>
                        <div class="col-md-6">
                            <input id="medication" type="text" class="form-control @error('medication') is-invalid @enderror" name="medication">
                            @error('medication')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="has_allergies" class="col-md-4 col-form-label text-md-right">{{ __('Tem Alergias?') }}</label>
                        <div class="col-md-6">
                            <select id="has_allergies" class="form-control @error('has_allergies') is-invalid @enderror" name="has_allergies" required>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            @error('has_allergies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="allergies" class="col-md-4 col-form-label text-md-right">{{ __('Qual Alergia?') }}</label>
                        <div class="col-md-6">
                            <input id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies">
                            @error('allergies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observations" class="col-md-4 col-form-label text-md-right">{{ __('Observações') }}</label>
                        <div class="col-md-6">
                            <textarea id="observations" class="form-control @error('observations') is-invalid @enderror" name="observations" required></textarea>
                            @error('observations')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Criar Prontuário') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection