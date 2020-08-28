<?php

use Illuminate\Database\Seeder;
use App\Vehiculo;
use App\Marca;
use App\Pais;
use App\Carroceria;
use App\Combustible;
use App\Imagen;
use App\Etiqueta;
use App\Tag;

class VehiculosSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $marca = new Marca();
        $marca->marca = 'Toyota';
        $marca->save();

        $marca = new Marca();
        $marca->marca = 'Honda';
        $marca->save();

        $marca = new Marca();
        $marca->marca = 'Peugeot';
        $marca->save();

        $pais = new Pais();
        $pais->pais = 'Japon';
        $pais->save();

        $pais = new Pais();
        $pais->pais = 'Estado Unidos';
        $pais->save();

        $pais = new Pais();
        $pais->pais = 'Francia';
        $pais->save();

        $carroceria = new Carroceria();
        $carroceria->carroceria = 'Sedan';
        $carroceria->save();

        $carroceria = new Carroceria();
        $carroceria->carroceria = 'Hatchback';
        $carroceria->save();


        $combustible = new Combustible();
        $combustible->combustible = 'Nafta';
        $combustible->save();

        $combustible = new Combustible();
        $combustible->combustible = 'Diesel';
        $combustible->save();

        $combustible = new Combustible();
        $combustible->combustible = 'Electrico';
        $combustible->save();

        $imagen = new Imagen();
        $imagen->imagen = 'Imagen de ejemplo 1';
        $imagen->save();

        $imagen = new Imagen();
        $imagen->imagen = 'Imagen de ejemplo 2';
        $imagen->save();

        $imagen = new Imagen();
        $imagen->imagen = 'Imagen de ejemplo 3';
        $imagen->save();

        $tag = new Tag();
        $tag->etiqueta = "Toyota"; //1
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "Honda"; //2
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "Pegueot"; //3
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "Corolla"; //4
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "Civic"; //5
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "206"; //6
        $tag->save();

        $tag = new Tag();
        $tag->etiqueta = "ALPISO"; //7
        $tag->save();

        $vehiculo = new Vehiculo();
        $vehiculo->marca_id = 1;
        $vehiculo->pais_id = 1;
        $vehiculo->carroceria_id = 1;
        $vehiculo->combustible_id = 1;
        $vehiculo->imagen_id = 1;
        $vehiculo->save();
        $vehiculo->Tags()->attach([1, 4, 7]);

        $vehiculo = new Vehiculo();
        $vehiculo->marca_id = 2;
        $vehiculo->pais_id = 2;
        $vehiculo->carroceria_id = 1;
        $vehiculo->combustible_id = 1;
        $vehiculo->imagen_id = 2;
        $vehiculo->save();
        $vehiculo->Tags()->attach([2, 5, 7]);

        $vehiculo = new Vehiculo();
        $vehiculo->marca_id = 3;
        $vehiculo->pais_id = 3;
        $vehiculo->carroceria_id = 2;
        $vehiculo->combustible_id = 2;
        $vehiculo->imagen_id = 3;
        $vehiculo->save();
        $vehiculo->Tags()->attach([3, 6, 7]);
    }

}
