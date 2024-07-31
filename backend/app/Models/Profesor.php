<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = "profesores";

    protected $fillable = ['nombre', 'apellido'];


    public function curso()
    {
        return $this->hasMany(Curso::class);
    }
}
