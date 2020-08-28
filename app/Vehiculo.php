<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function Marca(){
        return $this->belongsTo(Marca::class);
    }
    
    public function Pais(){
        return $this->belongsTo(Pais::class);
    }
    
    public function Carroceria(){
        return $this->belongsTo(Carroceria::class);
    }
    
    public function Combustible(){
        return $this->belongsTo(Combustible::class);
    }
    
    public function Imagen(){
        return $this->belongsTo(Imagen::class);
    }
    
    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }
}
