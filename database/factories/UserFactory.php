<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Taskapp\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'type' => $faker->numberBetween(1,2),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Taskapp\Models\Task::class, function(Faker $faker){
    return [
        'user_id' => $faker->numberBetween(1,8),
        'description' => $faker->text(100),
    ];
});
