<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

    public function post() {
        return $this->belongsTo(App\Album_fotos::class);
    }

}
