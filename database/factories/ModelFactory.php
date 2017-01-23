<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Taskapp\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'type' => $faker->numberBetween(1,2),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Taskapp\Models\Task::class, function(Faker\Generator $faker){
    return [
        'user_id' => $faker->numberBetween(1,8),
        'name' => $faker->text(100),
    ];
});
