<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function restaurantes() {
        return $this->hasMany(Restaurante::class, 'categoria_id', 'id');
    }
    public function bares() {
        return $this->hasMany(Bares::class, 'categoria_id', 'id');
    }
}
