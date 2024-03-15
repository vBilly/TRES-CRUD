<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = ['materia', 'id_docente'];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente'); // Asegúrate de que la clave foránea se llama 'id_docente'
    }
}
