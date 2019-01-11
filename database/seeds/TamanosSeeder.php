<?php

use Illuminate\Database\Seeder;

class TamanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tamano::create([
            'descripcion'=>'Grande',
            'tamaño'=>12
        ]);
        App\Tamano::create([
            'descripcion'=>'Mediano',
            'tamaño'=>6
        ]);
        App\Tamano::create([
            'descripcion'=>'Chico',
            'tamaño'=>3
        ]);
    }
}
