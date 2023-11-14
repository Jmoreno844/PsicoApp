<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'text',
        // Agrega otras columnas si las tienes en tu base de datos
    ];

    // Si la convención de nombres de Laravel se sigue (id, created_at, updated_at), no es necesario definirlos aquí

    // Puedes agregar relaciones aquí si es necesario
}
