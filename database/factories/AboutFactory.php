<?php

use Faker\Generator as Faker;

$factory->define(App\About::class, function (Faker $faker) {
    $title=$faker->sentence(1);
    return [
        'nombre' => $title,
        'descripcion' => $faker->text(150),
        'archivo'=>$faker->imageUrl($width=400,$height=200),
        'posicion'=>$faker->randomElement(['left','right']),
    ];
});
