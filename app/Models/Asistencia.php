<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'fecha',
        'entrada',
        'salida',
        'user_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function valida()
    {
        return $this->belongsTo(User::class, 'valida_id');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

}
