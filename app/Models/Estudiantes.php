<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes'; // Nombre de la tabla en la base de datos

    // Definir los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'est_cedula',
        'est_apellidos',
        'est_nombres',
        // Agregar aquí otros campos si es necesario
    ];

    // Opcional: definir relaciones con otros modelos
    // Ejemplo: una relación uno a muchos con las órdenes generadas
    public function ordenes()
    {
        return $this->hasMany(GeneraOrdenes::class, 'mat_id', 'id');
    }
}
