<?php

use Faker\Generator as Faker;

$factory->define(App\Support::class, function (Faker $faker) {
    return [
        'ar_detail' => 'تفاصيل',
        'en_detail' => 'details',
    ];
});
