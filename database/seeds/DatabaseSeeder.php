<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        DB::table('companies')->insert([
            'ar_name' => 'نبذة تعريفية عن الشركة',
            'ar_profile' => 'نبذة',
            'en_name' => 'A brief about the company',
            'en_profile' => 'Details',
            'projectSuccessful' => '1',
            'yearsOfExperienced' => '2',
            'professionalExpert' => '3',
            'happyCustomers' => '4',
         ]);
        factory(\App\User::class, 1)->create();
        factory(\App\Account::class, 1)->create();
        factory(\App\Affair::class, 1)->create();
        factory(\App\System::class, 1)->create();
        factory(\App\Pharmacy::class, 1)->create();
        factory(\App\Support::class, 1)->create();
        // $this->call(CompaniesSeeder::class);
    }
}
