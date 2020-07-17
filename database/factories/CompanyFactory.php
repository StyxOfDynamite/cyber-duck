<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
    	'name' => $faker->company,
    	'email' => $faker->safeEmail,
    	'website' => $faker->url,
    	'logo' => null,
    ];
});
