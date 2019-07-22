<?php

use Faker\Generator as Faker;

$factory->define(App\Affair::class, function (Faker $faker) {
    return [
        'ar_detail' => 'تفاصيل',
        'en_detail' => 'details',
    ];
});
