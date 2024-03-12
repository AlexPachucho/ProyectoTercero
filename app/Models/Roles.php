<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $primaryKey='rol_id';
    public $table='roles';

    protected $fillable = [
        'rol_descripcion'
    ];

    protected $casts = [
        'rol_descripcion'=>'string'
    ];

    public static array $rules = [
        'rol_descripcion' => 'required | string'
    ];
}
