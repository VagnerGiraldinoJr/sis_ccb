<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfirmaryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'temperature',
        'height',
        'takes_medication',
        'medication',
        'has_allergies',
        'allergies',
        'observations'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
