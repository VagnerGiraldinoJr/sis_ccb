<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igreja extends Model
{
    use HasFactory; // Garante o uso do trait HasFactory

    // Defina os campos permitidos para mass assignment
    protected $fillable = [
        'nome',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
        'numero',
    ];
}
