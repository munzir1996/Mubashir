<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'ar_detail' => 'تفاصيل',
        'en_detail' => 'details',
    ];
});
