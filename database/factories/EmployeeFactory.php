<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Http\File;

$factory->define(Employee::class, function (Faker $faker) {

    $photo = $faker->image();
    $imageFile = new File($photo);

    return [
        "name" => $faker->word(),
        "photo" => Storage::disk('public')->putFile('employeeimg',$imageFile),
        "email" => $faker->unique()->email,
        "phone_number" => $faker->numerify('#########'),
        "hire_date" => $faker->date('Y_m_d'),
        "date_of_birth" => $faker->date('Y_m_d'),
        "position" => $faker->word(),
        "department" => $faker->word(),
    ];
});
