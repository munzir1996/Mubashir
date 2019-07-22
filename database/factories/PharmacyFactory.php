<?php

use Faker\Generator as Faker;

$factory->define(App\Pharmacy::class, function (Faker $faker) {
    return [
        'ar_detail' => 'تفاصيل',
        'en_detail' => 'details',
    ];
});
