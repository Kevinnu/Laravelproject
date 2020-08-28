<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model {

    public function autos_categoria() {
        return $this->belongsTo(Autos_categoria::class);
    }

}
