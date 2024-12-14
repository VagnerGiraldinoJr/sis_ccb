<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_datetime',
        'end_datetime',
    ];

    /**
     * Relacionamento: Evento tem muitos colaboradores.
     */
    public function attendees()
    {
        return $this->belongsToMany(Person::class, 'event_attendances', 'event_id', 'person_id')
                    ->withTimestamps(); // Salva os timestamps automaticamente
    }
}
