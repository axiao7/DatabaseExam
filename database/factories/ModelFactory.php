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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\AnswerPaper::class, function (Faker\Generator $faker) {
    return [
        'score_1' => random_int(0,40),
        'score_2' => random_int(0,10),
        'score_3_1' => random_int(0,10),
        'score_3_2' => random_int(0,10),
        'score_3_3' => random_int(0,10),
        'score_3_4' => random_int(0,10),
        'score_3_5' => random_int(0,10),
        'total_score' => random_int(0,100),
    ];
});
