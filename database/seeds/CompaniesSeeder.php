<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Company::class)->create([
            'ar_name' => 'نبذة تعريفية عن الشركة',
            'ar_profile' => 'نبذة',
            'en_name' => 'A brief about the company',
            'en_profile' => 'Details',
            'projectSuccessful' => '1',
            'yearsOfExperienced' => '2',
            'professionalExpert' => '3',
            'happyCustomers' => '4',
        ]);
    }
}
