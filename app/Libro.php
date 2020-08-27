<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model {

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas() {
        return $this->belongsToMany(Etiqueta::class);
    }
    
    protected $dates = ['fecha']; // pasar fechas a carbon
    
}
