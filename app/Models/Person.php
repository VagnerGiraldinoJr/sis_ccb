<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'type',
        'address',
        'congregation',
    ];

    /**
     * Relacionamento: Colaborador pode participar de muitos eventos.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_attendances', 'person_id', 'event_id')
            ->withTimestamps();
    }

    /**
     * Relacionamento com registros de enfermaria (um para muitos).
     */
    public function infirmaryEntries()
    {
     
        return $this->hasMany(InfirmaryEntry::class);
    }

    
}
