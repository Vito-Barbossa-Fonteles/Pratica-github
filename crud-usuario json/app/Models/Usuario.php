<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    /**
     * Campos que podem ser preenchidos (mass assignable).
     */
    protected $fillable = [
        'nome',
        'dataNascimento',
        'email',
        'cpf',
        'fone',
        'rua',
        'cep',
        'bairro',
        'numero',
        'cidade',
        'estado',
    ];

    /**
     * Campos que devem ser convertidos para tipos nativos.
     */
    protected $casts = [
        'dataNascimento' => 'date',
    ];

    /**
     * Desativa o uso de timestamps (created_at e updated_at).
     */
    public $timestamps = false;
}