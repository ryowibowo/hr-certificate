<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // / data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 5; $x++){
 
        	// insert data dummy pegawai dengan faker
        	DB::table('employee')->insert([
        		'name' => $faker->name,
        		'nik' => $faker->nik,
        		'phone_number' => $faker->phoneNumber,
        	]);
 
        }
    }
}
