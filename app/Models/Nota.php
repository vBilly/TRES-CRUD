<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['id_materia', 'id_docente', 'nota'];

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }
}
