<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'rgm',
        'cpf',
        'nome',
        'idade',
        'genero',
        'curso',
        'campus',
        'inicio',
        'ativo'
    ];

    protected $casts = [
        'rgm' => 'string',
        'cpf' => 'string',
        'nome' => 'string',
        'idade' => 'decimal:0',
        'genero' => 'string',
        'curso' => 'string',
        'campus' => 'string',
        'inicio' => 'date',
        'ativo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
}
