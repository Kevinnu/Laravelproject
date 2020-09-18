<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album_fotos extends Model {

    public function Comentario() {
        return $this->hasMany(App\Comentario::class);
    }

}
