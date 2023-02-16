<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function administradores()
    {
        return $this->hasMany(Administrador::class);
    }

    public function odontologos()
    {
        return $this->hasMany(Odontologo::class);
    }

    public function clinicas()
    {
        return $this->hasMany(Clinica::class);
    }
}