<?php

use Faker\Generator as Faker;

$factory->define(App\System::class, function (Faker $faker) {
    return [
        'ar_detail' => 'تفاصيل',
        'en_detail' => 'details',
    ];
});
