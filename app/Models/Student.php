<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rgm',
        'idade',
        'genero',
        'curso',
        'campus',
        'inicio',
        'ativo'
    ];

    protected $casts = [
        'inicio' => 'date',
        'ativo' => 'boolean',
        'idade' => 'integer'
    ];
}