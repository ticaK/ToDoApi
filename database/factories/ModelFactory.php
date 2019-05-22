<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Todo;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),    
        'description' => $faker->text(100),
        'priority' => $faker->randomElement($array = array ('low','medium','high')),
        'completed' => $faker->boolean,
        'user_id' => function() {
            return App\User::all()->random()->id;
        }
    ];
});