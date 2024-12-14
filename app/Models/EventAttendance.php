<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'person_id',
        'check_in_time',
        'check_out_time',
    ];

    /**
     * Relacionamento com a tabela de pessoas.
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * Relacionamento com a tabela de eventos.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
