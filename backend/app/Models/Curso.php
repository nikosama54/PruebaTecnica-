<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = "cursos";

    protected $fillable = ['nombre', 'anio'];

    public function materia()
    {
        return $this->hasMany(Materia::class);
    }

    public function estudiante()
    {
        return $this->hasMany(CursoEstudiante::class);
    }
}
