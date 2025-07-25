<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    /** @use HasFactory<\Database\Factories\InquilinoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombres',
        'email',
        'telefono',
        'fecha_nacimiento',
        'documento_identidad',
    ];
}
